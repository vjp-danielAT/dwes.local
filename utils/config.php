<?php

return [
    'database' => [
        'username' => 'userProyecto',
        'password' => 'userProyecto',
        'connection' => 'mysql:host=dwes.local;dbname=proyecto;charset=utf8',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_AUTOCOMMIT => false
        ]
    ]
];