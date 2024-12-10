<?php
require 'utils/utils.php';
require_once 'classes/others/file.class.php';
require_once 'classes/entity/imagenGaleria.class.php';
require_once 'classes/repository/imagenGaleriaRepository.class.php';
require_once 'classes/entity/categoria.class.php';

$error = '';

try {

	/* Objeto Repository, usado para realizar operaciones
	INSERT y SELECT con la BD */
	$imagenRepository = new ImagenGaleriaRepository();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$descripcion = trim(htmlspecialchars($_POST['descripcion']));
		$categoria = trim(htmlspecialchars($_POST['categoria']));

		$tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png',];

		// Crea el fichero, lo guarda en la galería y lo copia en el directorio 'portfolio'
		$imagen = new File('imagen', $tiposAceptados);
		$imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
		$imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

		// Sentencias SQL de tipo INSERT
		$imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
		$imagenRepository->guardar($imagenGaleria);
		$mensaje = 'Se ha guardado una nueva imagen: ' . $imagenGaleria->getNombre();

		// Guarda en el log del proyecto el mensaje
		App::get('logger')->generarLog($mensaje);
	}
} catch (FileException | QueryException | AppException $exc) {
	die($exc->getMessage());
}

header('location: /galeria');