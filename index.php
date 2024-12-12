<?php

use proyecto\classes\others\Router;
use proyecto\classes\exception\NotFoundException;

// Carga configuraciones por defecto del proyecto
require 'utils/bootstrap.php';

// Redirección de rutas amigables del proyecto
$router = new Router('utils/routes.php');

try {
    require $router->redirect();
} catch (NotFoundException $exc) {
    die($exc->getMessage());
}