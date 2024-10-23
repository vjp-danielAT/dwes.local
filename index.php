<?php

require 'utils/utils.php';
require_once 'entity/imagenGaleria.class.php';

$imagenes = [];

// Crea un array de objetos ImagenGaleria y les asigna valores por defecto
for ($i = 1; $i <= 12; $i++) {
    $imagenes[] = new ImagenGaleria($i . '.jpg', 'descripción imagen ' . $i, rand(500, 1000), rand(250, 500), rand(50, 200));
}

require 'views/index.view.php';