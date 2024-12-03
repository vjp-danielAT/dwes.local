<?php

// Carga configuraciones por defecto del proyecto
require 'utils/bootstrap.php';

// Redirección de rutas amigables del proyecto
$routes = require 'utils/routes.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

require $routes[$uri];