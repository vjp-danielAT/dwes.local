<?php

require 'utils/utils.php';
require_once 'classes/entity/partner.class.php';
require_once 'classes/repository/partnerRepository.class.php';
require_once 'classes/others/file.class.php';
require_once 'classes/entity/imagenGaleria.class.php';

$error = '';

try {

	// Crea una conexión con la BD
	$config = require_once 'utils/config.php';
	App::bind('config', $config);

	/* Objeto Repository, usado para realizar operaciones
	INSERT y SELECT con la BD */
    $partnerRepository = new PartnerRepository();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = trim(htmlspecialchars($_POST['nombre']));
		$descripcion = trim(htmlspecialchars($_POST['descripcion']));

		$tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png',];

		// Crea el fichero, lo guarda en la galería y lo copia en el directorio 'portfolio'
		$logo = new File('logo', $tiposAceptados);
		$logo->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
		$logo->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

		// Sentencias SQL de tipo INSERT
        $partner = new Partner($nombre, $logo->getFileName(), $descripcion);
        $partnerRepository->guardar($partner);
		$mensaje = 'Asociado guardado';
	}
} catch (FileException | QueryException | AppException $exc) {
	$error = $exc->getMessage();
} finally {
	$asociados = $partnerRepository->findAll();
}

require 'views/partners.view.php';