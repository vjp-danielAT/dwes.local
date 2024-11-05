<?php

require_once 'exceptions/queryException.class.php';

class QueryBuilder {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    // Selecciona todos los elementos de una tabla de la base de datos
    public function findAll($tabla, $clase) {
        $sql = "SELECT * FROM $tabla";

        $pdo = $this->connection->prepare($sql);

        if ($pdo->execute() === false) {
            throw new QueryException('No se ha podido ejecutar la consulta');
        }

        // Retorna un array de objetos de la clase indicada
        return $pdo->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $clase);
    }
}