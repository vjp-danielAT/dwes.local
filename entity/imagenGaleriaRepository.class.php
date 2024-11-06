<?php

require_once 'entity/queryBuilder.class.php';

class ImagenGaleriaRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('imagenes', 'ImagenGaleria');
    }

    // Retorna el objeto Categoría de la categoría de una imagen
    public function getCategoria($imagen) {
        $categoriaRepository = new CategoriaRepository();
        return $categoriaRepository->find($imagen->getCategoria());
    }
}