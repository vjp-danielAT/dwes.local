<?php

require_once 'classes/database/queryBuilder.class.php';

class CategoriaRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('categorias', 'Categoria');
    }

    // Incrementa el número de imágenes de la categoría
    public function nuevaImagen($categoria) {
        $categoria->setNumImagenes($categoria->getNumImagenes() + 1);
        $this->update($categoria);
    }
}