<?php

require_once 'exceptions/appException.class.php';

class App {
    // Almacena objetos de nuestro proyecto
    private static $container = [];

    // Almacena un objeto en container
    public static function bind($clave, $valor) {
        static::$container[$clave] = $valor;
    }

    // Obtiene un objeto del container
    public static function get($clave)  {
        if (!array_key_exists($clave, static::$container)) {
            throw new AppException('No se ha encontrado la clave en el contenedor');
        }

        return static::$container[$clave];
    }

    // Obtiene la conexión
    public static function getConnection() {
        static::$container['connection'] = Connection::make();
        return static::$container['connection'];
    }
}