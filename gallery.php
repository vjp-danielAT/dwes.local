<?php
require 'utils/utils.php';
require_once 'utils/file.class.php';
require_once 'entity/imagenGaleria.class.php';

$descripcion = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	try {
		$descripcion = trim(htmlspecialchars($_POST['descripcion']));

		$tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png',];

		$imagen = new File('imagen', $tiposAceptados);
		$imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
		$imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

		$mensaje = 'Datos enviados';
	} catch (FileException $exc) {
		$error = $exc->getMessage();
	}
}

require 'views/gallery.view.php';
