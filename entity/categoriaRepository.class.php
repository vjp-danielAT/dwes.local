<?php

require_once 'entity/queryBuilder.class.php';

class CategoriaRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('categorias', 'Categoria');
    }
}