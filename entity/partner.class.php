<?php

require_once 'entity/iEntity.class.php';

class Partner implements IEntity {
    private $nombre;
    private $logo;
    private $descripcion;
    private $id;
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    // Constructor

    public function __construct($nombre = '', $logo = '', $descripcion = '') {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    // Devuelve el objeto como un array

    public function toArray() {
        return [
            'nombre' => $this->nombre,
            'logo' => $this->logo,
            'descripcion' => $this->descripcion
        ];
    }

    // Función para obtener la URL del logo

    public function getUrlLogo() {
        return self::RUTA_IMAGENES_GALLERY . $this->logo;
    }

    // Getters

    public function getId() {
        return $this->id;
    }

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