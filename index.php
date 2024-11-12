<?php

require 'utils/utils.php';
require_once 'entity/imagenGaleria.class.php';
require_once 'entity/partner.class.php';
require_once 'entity/imagenGaleriaRepository.class.php';
require_once 'entity/partnerRepository.class.php';
require_once 'entity/connection.class.php';

try {

	// Crea una conexión con la BBDD
	$config = require_once 'utils/config.php';
	App::bind('config', $config);

    /* Objetos Repository, usados para realizar operaciones
	INSERT y SELECT con la BBDD */
	$imagenRepository = new ImagenGaleriaRepository();
	$partnerRepository = new PartnerRepository();

} catch (QueryException | AppException $exc) {
	$error = $exc->getMessage();
} finally {
	$imagenes = $imagenRepository->findAll();
	$asociados = $partnerRepository->findAll();
	$tresAsociados = extraer3Aleatorios($asociados);
}

require 'views/index.view.php';