<?php

require 'utils/utils.php';
use proyecto\classes\repository\ImagenGaleriaRepository;
use proyecto\classes\repository\PartnerRepository;
use proyecto\classes\exception\QueryException;
use proyecto\classes\exception\AppException;

try {

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