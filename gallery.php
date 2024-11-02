<?php
require 'utils/utils.php';
require_once 'utils/file.class.php';
require_once 'entity/imagenGaleria.class.php';
require_once 'database/connection.class.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	try {
		$descripcion = trim(htmlspecialchars($_POST['descripcion']));

		$tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png',];

		// Crea el fichero, lo guarda en la galería y lo copia en el directorio 'portfolio'
		$imagen = new File('imagen', $tiposAceptados);
		$imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
		$imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

		// Crea una conexión con la BBDD
		$connection = Connection::make();

		$sql = 'INSERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)';
		$pdo = $connection->prepare($sql);
		$parametros = [':nombre' => $imagen->getFileName(), ':descripcion' => $descripcion];

		if ($pdo->execute($parametros)) {
			$mensaje = 'Datos enviados';
		} else {
			$error = 'No se ha podido guardar la imagen en la base de datos';
		}
	} catch (FileException $exc) {
		$error = $exc->getMessage();
	}
}

require 'views/gallery.view.php';
