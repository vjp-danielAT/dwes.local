<?php

class ImagenGaleria {
    private $nombre;
    private $descripcion;
    private $numVisualizaciones;
    private $numLikes;
    private $numDownloads;
    private $id;
    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    // Constructor

    public function __construct($nombre = '', $descripcion = '') {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = rand(500, 1000);
        $this->numLikes = rand(250, 500);
        $this->numDownloads = rand(50, 200);
    }

    // Funciones para obtener las URL

    public function getUrlPortfolio() {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->nombre;
    }

    public function getUrlGallery() {
        return self::RUTA_IMAGENES_GALLERY . $this->nombre;
    }

    // Getters y Setters

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setNumVisualizaciones($numVisualizaciones) {
        $this->numVisualizaciones = $numVisualizaciones;
    }

    public function getNumVisualizaciones() {
        return $this->numVisualizaciones;
    }

    public function setNumLikes($numLikes) {
        $this->numLikes = $numLikes;
    }

    public function getNumLikes() {
        return $this->numLikes;
    }

    public function setNumDownloads($numDownloads) {
        $this->numDownloads = $numDownloads;
    }

    public function getNumDownloads() {
        return $this->numDownloads;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
}
