<?php

require_once 'exceptions/queryException.class.php';
require_once 'exceptions/notFoundException.class.php';
require_once 'entity/app.class.php';

abstract class QueryBuilder {
    private $connection;
    private $tabla;
    private $clase;

    public function __construct($tabla, $clase) {
        $this->connection = App::getConnection();
        $this->tabla = $tabla;
        $this->clase = $clase;
    }

    // Ejecuta una sentencia SQL
    private function executeQuery($sql) {
        $pdo = $this->connection->prepare($sql);
        
        if ($pdo->execute() === false) {
            throw new QueryException('No se ha podido ejecutar la consulta');
        }

        // Retorna un array de objetos de la clase indicada
        return $pdo->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->clase);
    }

    // Retorna un único elemento de una tabla de la BBDD
    public function find($id) {
        $sql = "SELECT * FROM $this->tabla WHERE id=$id";
        $resultado = $this->executeQuery($sql);

        if (empty($resultado)) {
            throw new NotFoundException('No se ha encontrado ningún elemento con el id ' . $id);
        }

        /* Como solo buscamos un elemento, nos retornamos
        el primer elemento del array */
        return $resultado[0];
    }

    // Selecciona todos los elementos de una tabla de la BBDD
    public function findAll() {
        $sql = "SELECT * FROM $this->tabla";
        return $this->executeQuery($sql);
    }

    // Realiza un insert en la BBDD
    public function save($entidad) {
        try {
            $parametros = $entidad->toArray();
            $claves = array_keys($parametros);
            
            $sql = 'INSERT INTO ' . $this->tabla .
            ' (' . implode(' ,', $claves) . ') ' .
            'VALUES (:' . implode(', :', $claves) . ')';

            $pdo = $this->connection->prepare($sql);
            $pdo->execute($parametros);
        } catch (QueryException) {
            throw new QueryException('Error al insertar en la BD');
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
            throw new QueryException('No se ha podido realizar la operación');
        }
    }

    // Actualiza los valores de la BBDD
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
            throw new QueryException('Error al actualizar');
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