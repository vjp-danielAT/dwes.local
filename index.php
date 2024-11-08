<?php

require 'utils/utils.php';
require_once 'entity/imagenGaleria.class.php';
require_once 'entity/partner.class.php';
require_once 'entity/imagenGaleriaRepository.class.php';
require_once 'entity/connection.class.php';

// Array de asociados
$nombresAsociados = ['Mario', 'Hugo', 'Jose', 'Adri', 'Iker'];
$asociados = [];

for ($i = 0; $i < sizeof($nombresAsociados); $i++) {
    $asociados[] = new Partner($nombresAsociados[$i]);
}

$tresAsociados = extraer3Aleatorios($asociados);

// Imágenes de la galería

try {

	// Crea una conexión con la BBDD
	$config = require_once 'utils/config.php';
	App::bind('config', $config);

    /* ImagenRepository, usada para realizar operaciones
	INSERT y SELECT con la BBDD */
	$imagenRepository = new ImagenGaleriaRepository();

} catch (QueryException | AppException $exc) {
	$error = $exc->getMessage();
} finally {
	$imagenes = $imagenRepository->findAll();
}

require 'views/index.view.php';