<?php

require 'utils/utils.php';
use proyecto\classes\repository\PartnerRepository;
use proyecto\classes\others\File;
use proyecto\classes\entity\ImagenGaleria;
use proyecto\classes\entity\Partner;
use proyecto\classes\exception\FileException;
use proyecto\classes\exception\QueryException;
use proyecto\classes\exception\AppException;

$error = '';

try {

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
	die($exc->getMessage());
}

header('location: /asociados');