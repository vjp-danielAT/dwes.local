<?php

require 'utils/utils.php';
use proyecto\classes\repository\PartnerRepository;
use proyecto\classes\exception\QueryException;
use proyecto\classes\exception\AppException;

$error = '';

try {

	/* Objeto Repository, usado para realizar operaciones
	INSERT y SELECT con la BD */
    $partnerRepository = new PartnerRepository();

} catch (QueryException | AppException $exc) {
	$error = $exc->getMessage();
} finally {
	$asociados = $partnerRepository->findAll();
}

require 'views/partners.view.php';