<?php

namespace proyecto\classes\repository;

use proyecto\classes\database\QueryBuilder;
use proyecto\classes\entity\Categoria;

class CategoriaRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('categorias', Categoria::class);
    }

    // Incrementa el número de imágenes de la categoría
    public function nuevaImagen($categoria) {
        $categoria->setNumImagenes($categoria->getNumImagenes() + 1);
        $this->update($categoria);
    }
}