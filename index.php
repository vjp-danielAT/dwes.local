<?php

require 'utils/utils.php';
require_once 'entity/imagenGaleria.class.php';
require_once 'entity/partner.class.php';

$imagenes = [];

// Crea un array de objetos ImagenGaleria y les asigna valores por defecto
for ($i = 1; $i <= 12; $i++) {
    $imagenes[] = new ImagenGaleria($i . '.jpg', 'descripción imagen ' . $i);
}

// Array de asociados
$nombresAsociados = ['Mario', 'Hugo', 'Jose', 'Adri', 'Iker'];
$asociados = [];

for ($i = 0; $i < sizeof($nombresAsociados); $i++) {
    $asociados[] = new Partner($nombresAsociados[$i]);
}

$tresAsociados = extraer3Aleatorios($asociados);

require 'views/index.view.php';