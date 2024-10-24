<?php
require 'utils/utils.php';
require_once 'utils/file.class.php';

$descripcion = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	try {
		$descripcion = trim(htmlspecialchars($_POST['descripcion']));

		$tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png',];

		$imagen = new File('imagen', $tiposAceptados);

		$mensaje = 'Datos enviados';
	} catch (FileException $exc) {
		$errores[] = $exc->getMessage();
	}
}

require 'views/gallery.view.php';
