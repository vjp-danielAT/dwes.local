<?php

require_once 'entity/iEntity.class.php';

class Categoria implements IEntity {
    private $id;
    private $nombre;
    private $numImagenes;

    // Constructor

    public function __construct($nombre = '', $numImagenes = 0) {
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
    }

    // Devuelve un array con los datos del objeto

    public function toArray() {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'numImagenes' => $this->numImagenes
        ];
    }

    // Getters

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getNumImagenes() {
        return $this->numImagenes;
    }

    // Setter de numImagenes

    public function setNumImagenes($numImagenes) {
        $this->numImagenes = $numImagenes;
    }
}