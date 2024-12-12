<?php
require 'utils/utils.php';
use proyecto\classes\repository\ImagenGaleriaRepository;
use proyecto\classes\repository\CategoriaRepository;
use proyecto\classes\exception\QueryException;
use proyecto\classes\exception\AppException;

$error = '';

try {

	/* Objetos Repository, usados para realizar operaciones
	INSERT y SELECT con la BD */
	$imagenRepository = new ImagenGaleriaRepository();
	$categoriaRepository = new CategoriaRepository();
	
} catch (QueryException | AppException $exc) {
	$error = $exc->getMessage();
} finally {
	$imagenes = $imagenRepository->findAll();
	$categorias = $categoriaRepository->findAll();
}

require 'views/gallery.view.php';