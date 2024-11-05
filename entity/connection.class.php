<?php

class Connection {
    public static function make() {
        $opciones = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ];

        try {
            $connection = new PDO('mysql:host=dwes.local;dbname=proyecto;charset=utf8',
            'userProyecto', // Nombre de usuario
            'userProyecto', // Contraseña
            $opciones);
        } catch (PDOException $excepcion) {
            // die() detiene el script y muestra lo que recibe por parámetros
            die($excepcion->getMessage());
        }

        return $connection;
    }
}