<?php

require_once 'classes/database/queryBuilder.class.php';
require_once 'classes/repository/categoriaRepository.class.php';

class ImagenGaleriaRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('imagenes', 'ImagenGaleria');
    }

    // Retorna el objeto Categoría de la categoría de una imagen
    public function getCategoria($imagenGaleria) {
        $categoriaRepository = new CategoriaRepository();
        return $categoriaRepository->find($imagenGaleria->getCategoria());
    }

    /* Guarda una imagen en la BBDD usando transacciones */
    public function guardar($imagenGaleria) {
        $guardarImagen = function() use ($imagenGaleria) {
            $categoria = $this->getCategoria($imagenGaleria);
            $categoriaRepository = new CategoriaRepository();

            // Incrementa el número de imágenes en la categoría
            $categoriaRepository->nuevaImagen($categoria);

            $this->save($imagenGaleria);
        };

        $this->transaccion($guardarImagen);
    }
}