<?php

class Partner {
    private $nombre;
    private $logo;
    private $descripcion;

    // Constructor

    public function __construct($nombre) {
        $this->nombre = $nombre;
        $this->logo = strtolower($nombre) . '.jpg';
        $this->descripcion = 'Asociado ' . $nombre;
    }

    // Getters

    public function getNombre() {
        return $this->nombre;
    }

    public function getLogo() {
        return $this->logo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
}