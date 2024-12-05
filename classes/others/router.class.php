<?php

require_once 'classes/exception/notFoundException.class.php';

class Router {
    private $uri;
    private $routes;

    public function __construct($ficheroRutas) {
        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
        $this->routes = require_once $ficheroRutas;
    }

    public function redirect() {
        if (array_key_exists($this->uri, $this->routes)) {
            return $this->routes[$this->uri];
        } else {
            throw new NotFoundException('No se ha definido una ruta para la uri solicitada');
        }
    }
}