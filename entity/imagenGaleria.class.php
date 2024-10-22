<?php

class ImagenGaleria {
    private $nombre;
    private $descripcion;
    private $numVisualizaciones;
    private $numLikes;
    private $numDownloads;
    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    // Constructor

    public function __construct($nombre, $descripcion, $numVisualizaciones = 0, $numLikes = 0, $numDownloads = 0) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
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
}
