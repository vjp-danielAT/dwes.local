<?php

require 'utils/utils.php';
require_once 'classes/entity/imagenGaleria.class.php';
require_once 'classes/entity/partner.class.php';
require_once 'classes/repository/imagenGaleriaRepository.class.php';
require_once 'classes/repository/partnerRepository.class.php';

try {

	// Crea una conexión con la BD
	$config = require_once 'utils/config.php';
	App::bind('config', $config);

    /* Objetos Repository, usados para realizar operaciones
	INSERT y SELECT con la BD */
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