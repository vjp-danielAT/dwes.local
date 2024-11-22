<?php

require_once 'classes/exception/appException.class.php';
require_once 'classes/database/connection.class.php';
require_once 'utils/const.php';

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
            throw new AppException(getErrorString('KEY_NOT_FOUND'));
        }

        return static::$container[$clave];
    }

    // Obtiene la conexión
    public static function getConnection() {
        static::$container['connection'] = Connection::make();
        return static::$container['connection'];
    }
}