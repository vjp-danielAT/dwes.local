<?php

require_once 'exceptions/queryException.class.php';
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

    // Selecciona todos los elementos de una tabla de la base de datos
    public function findAll() {
        $sql = "SELECT * FROM $this->tabla";

        $pdo = $this->connection->prepare($sql);

        if ($pdo->execute() === false) {
            throw new QueryException('No se ha podido ejecutar la consulta');
        }

        // Retorna un array de objetos de la clase indicada
        return $pdo->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->clase);
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
}