<?php

require 'utils/utils.php';
require_once 'classes/entity/partner.class.php';
require_once 'classes/repository/partnerRepository.class.php';

$error = '';

try {

	/* Objeto Repository, usado para realizar operaciones
	INSERT y SELECT con la BD */
    $partnerRepository = new PartnerRepository();

} catch (FileException | QueryException | AppException $exc) {
	$error = $exc->getMessage();
} finally {
	$asociados = $partnerRepository->findAll();
}

require 'views/partners.view.php';