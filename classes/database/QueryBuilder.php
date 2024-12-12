<?php

namespace proyecto\classes\database;

use proyecto\classes\exception\QueryException;
use proyecto\classes\exception\NotFoundException;
use PDO;
use PDOException;
require_once 'utils/const.php';

abstract class QueryBuilder {
    private $connection;
    private $tabla;
    private $clase;

    public function __construct($tabla, $clase) {
        $this->connection = App::getConnection();
        $this->tabla = $tabla;
        $this->clase = $clase;
    }

    // Ejecuta una consulta SQL
    private function executeQuery($sql) {
        $pdo = $this->connection->prepare($sql);
        
        if ($pdo->execute() === false) {
            throw new QueryException(getErrorString('QUERY_ERROR'));
        }

        // Retorna un array de objetos de la clase indicada
        return $pdo->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->clase);
    }

    // Retorna un único elemento de una tabla de la BD
    public function find($id) {
        $sql = "SELECT * FROM $this->tabla WHERE id=$id";
        $resultado = $this->executeQuery($sql);

        if (empty($resultado)) {
            throw new NotFoundException(getErrorString('ITEM_NOT_FOUND') . $id);
        }

        /* Como solo buscamos un elemento, nos retornamos
        el primer elemento del array */
        return $resultado[0];
    }

    // Selecciona todos los elementos de una tabla de la BD
    public function findAll() {
        $sql = "SELECT * FROM $this->tabla";
        return $this->executeQuery($sql);
    }

    // Realiza un insert en la BD
    public function save($entidad) {
        try {
            $parametros = $entidad->toArray();
            $claves = array_keys($parametros);
            
            $sql = 'INSERT INTO ' . $this->tabla .
            ' (' . implode(', ', $claves) . ') ' .
            'VALUES (:' . implode(', :', $claves) . ')';

            $pdo = $this->connection->prepare($sql);
            $pdo->execute($parametros);
        } catch (QueryException) {
            throw new QueryException(getErrorString('INSERT_ERROR'));
        }
    }

    // Realiza una transacción
    public function transaccion($ejecutarSQL) {
        try {
            $this->connection->beginTransaction();
            $ejecutarSQL();
            $this->connection->commit();
        } catch (PDOException) {
            $this->connection->rollBack();
            throw new QueryException(getErrorString('TRANSACTION_ERROR'));
        }
    }

    // Actualiza los valores de una fila de la BD
    public function update($entidad) {
        try {
            $parametros = $entidad->toArray();
            $claves = array_keys($parametros);

            $sql = 'UPDATE ' . $this->tabla .
            ' SET ' . $this->getUpdates($claves) .
            ' WHERE id=:id';

            $pdo = $this->connection->prepare($sql);
            $pdo->execute($parametros);
        } catch (PDOException) {
            throw new QueryException(getErrorString('UPDATE_ERROR'));
        }
    }

    // Retorna un string con todos los parámetros a actualizar
    private function getUpdates($claves) {
        $updates = [];

        foreach ($claves as $clave) {
            if ($clave !== 'id') {
                $updates[] = $clave . '=:' . $clave;
            }
        }

        return implode(', ', $updates);
    }
}