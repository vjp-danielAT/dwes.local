<?php
require 'utils/utils.php';
require_once 'entity/file.class.php';
require_once 'entity/imagenGaleria.class.php';
require_once 'entity/connection.class.php';
require_once 'entity/imagenGaleriaRepository.class.php';
require_once 'entity/categoria.class.php';
require_once 'entity/categoriaRepository.class.php';

$error = '';

try {

	// Crea una conexión con la BBDD
	$config = require_once 'utils/config.php';
	App::bind('config', $config);
	$connection = App::getConnection();

	/* Objetos Repository, usados para realizar operaciones
	INSERT y SELECT con la BBDD */
	$imagenRepository = new ImagenGaleriaRepository();
	$categoriaRepository = new CategoriaRepository();

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
		$imagenRepository->save($imagenGaleria);
		$mensaje = 'Imagen guardada';
	}
} catch (FileException | QueryException | AppException $exc) {
	$error = $exc->getMessage();
} finally {
	$imagenes = $imagenRepository->findAll();
	$categorias = $categoriaRepository->findAll();
}

require 'views/gallery.view.php';