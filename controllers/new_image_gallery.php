<?php
require 'utils/utils.php';
use proyecto\classes\repository\ImagenGaleriaRepository;
use proyecto\classes\others\File;
use proyecto\classes\entity\ImagenGaleria;
use proyecto\classes\database\App;
use proyecto\classes\exception\FileException;
use proyecto\classes\exception\QueryException;
use proyecto\classes\exception\AppException;

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