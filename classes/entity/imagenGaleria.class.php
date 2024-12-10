<?php

namespace proyecto\classes\entity;

require_once 'classes/interface/iEntity.class.php';

class ImagenGaleria implements iEntity {
    private $nombre;
    private $descripcion;
    private $categoria;
    private $numVisualizaciones;
    private $numLikes;
    private $numDownloads;
    private $id;
    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    // Constructor

    public function __construct($nombre = '', $descripcion = '', $categoria = 0) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->numVisualizaciones = rand(500, 1000);
        $this->numLikes = rand(250, 500);
        $this->numDownloads = rand(50, 200);
    }

    // Devuelve el objeto como un array

    public function toArray() {
        return [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'categoria' => $this->categoria,
            'numVisualizaciones' => $this->numVisualizaciones,
            'numLikes' => $this->numLikes,
            'numDownloads' => $this->numDownloads
        ];
    }

    // Funciones para obtener las URL

    public function getUrlPortfolio() {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->nombre;
    }

    public function getUrlGallery() {
        return self::RUTA_IMAGENES_GALLERY . $this->nombre;
    }

    // Getters

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getNumVisualizaciones() {
        return $this->numVisualizaciones;
    }

    public function getNumLikes() {
        return $this->numLikes;
    }

    public function getNumDownloads() {
        return $this->numDownloads;
    }

    public function getId() {
        return $this->id;
    }
}
