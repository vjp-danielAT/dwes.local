<?php
require 'utils/utils.php';
require_once 'classes/others/file.class.php';
require_once 'classes/entity/imagenGaleria.class.php';
require_once 'classes/repository/imagenGaleriaRepository.class.php';
require_once 'classes/entity/categoria.class.php';
require_once 'classes/repository/categoriaRepository.class.php';

$error = '';

try {

	/* Objetos Repository, usados para realizar operaciones
	INSERT y SELECT con la BD */
	$imagenRepository = new ImagenGaleriaRepository();
	$categoriaRepository = new CategoriaRepository();
	
} catch (FileException | QueryException | AppException $exc) {
	$error = $exc->getMessage();
} finally {
	$imagenes = $imagenRepository->findAll();
	$categorias = $categoriaRepository->findAll();
}

require 'views/gallery.view.php';