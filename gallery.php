<?php
require 'utils/utils.php';
require_once 'utils/file.class.php';
require_once 'entity/imagenGaleria.class.php';
require_once 'database/connection.class.php';
require_once 'database/queryBuilder.class.php';

$error = '';

try {

	// Crea una conexión con la BBDD
	$connection = Connection::make();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$descripcion = trim(htmlspecialchars($_POST['descripcion']));
		$numVisualizaciones = rand(500, 1000);
        $numLikes = rand(250, 500);
        $numDownloads = rand(50, 200);

		$tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png',];

		// Crea el fichero, lo guarda en la galería y lo copia en el directorio 'portfolio'
		$imagen = new File('imagen', $tiposAceptados);
		$imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
		$imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

		// Sentencias SQL
		$sql = 'INSERT INTO imagenes (nombre, descripcion, numVisualizaciones, numLikes, numDownloads) 
		VALUES (:nombre, :descripcion, :numVisualizaciones, :numLikes, :numDownloads)';
		$pdo = $connection->prepare($sql);
		$parametros = [
			':nombre' => $imagen->getFileName(),
			':descripcion' => $descripcion,
			':numVisualizaciones' => $numVisualizaciones,
			':numLikes' => $numLikes,
			':numDownloads' => $numDownloads
		];

		if ($pdo->execute($parametros)) {
			$mensaje = 'Datos enviados';
		} else {
			$error = 'No se ha podido guardar la imagen en la base de datos';
		}
	}

	$consultaSelect = new QueryBuilder($connection);
	$imagenes = $consultaSelect->findAll('imagenes', 'ImagenGaleria');

} catch (FileException | QueryException $exc) {
	$error = $exc->getMessage();
}

require 'views/gallery.view.php';
