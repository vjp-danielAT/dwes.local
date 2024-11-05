<?php

require_once 'entity/queryBuilder.class.php';

class ImagenGaleriaRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('imagenes', 'ImagenGaleria');
    }
}