<?php

namespace proyecto\classes\repository;

use proyecto\classes\database\QueryBuilder;
use proyecto\classes\entity\ImagenGaleria;

class ImagenGaleriaRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('imagenes', ImagenGaleria::class);
    }

    // Retorna el objeto Categoría de la categoría de una imagen
    public function getCategoria($imagenGaleria) {
        $categoriaRepository = new CategoriaRepository();
        return $categoriaRepository->find($imagenGaleria->getCategoria());
    }

    // Guarda una imagen en la BD usando transacciones
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