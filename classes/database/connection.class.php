<?php

class Connection {
    public static function make() {

        $config = App::get('config')['database'];

        try {
            $connection = new PDO(
            $config['connection'], // Conexión a la BBDD
            $config['username'], // Nombre de usuario
            $config['password'], // Contraseña
            $config['options'] // Parámetros de la conexión
            );
        } catch (PDOException $excepcion) {
            // die() detiene el script y muestra lo que recibe por parámetros
            die($excepcion->getMessage());
        }

        return $connection;
    }
}