<?php

require 'utils/utils.php';
require_once 'entity/partner.class.php';

// Array de asociados
$nombresAsociados = ['Mario', 'Hugo', 'Jose', 'Adri', 'Iker'];
$asociados = [];

for ($i = 0; $i < sizeof($nombresAsociados); $i++) {
    $asociados[] = new Partner($nombresAsociados[$i]);
}

$tresAsociados = extraer3Aleatorios($asociados);

require 'views/partners.view.php';