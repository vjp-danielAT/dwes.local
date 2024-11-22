<?php

require 'utils/utils.php';
require_once 'classes/entity/mensaje.class.php';
require_once 'classes/repository/mensajeRepository.class.php';
require_once 'classes/database/connection.class.php';

$errores = [];

try {

    // Crea una conexión con la BBDD
    $config = require_once 'utils/config.php';
    App::bind('config', $config);

    /* Objeto Repository, usado para realizar operaciones
	INSERT y SELECT con la BBDD */
    $mensajeRepository = new MensajeRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $apellido = trim(htmlspecialchars($_POST['apellido']));
        $correo = trim(htmlspecialchars($_POST['correo']));
        $asunto = trim(htmlspecialchars($_POST['asunto']));
        $mensaje = trim(htmlspecialchars($_POST['mensaje']));

        // Compruebo que los datos obligatorios no estén vacíos y valido el correo
        if (empty($nombre)) {
            $errores[] = 'El nombre no puede estar vacío';
        }

        if (empty($correo)) {
            $errores[] = 'La dirección de correo no puede estar vacía';
        } else if (filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
            $errores[] = 'La dirección de correo es incorrecta';
        }

        if (empty($asunto)) {
            $errores[] = 'El asunto no puede estar vacío';
        }

        // Este array se usa en la vista para mostrar los datos con un bucle
        $datos = [
            'Nombre' => $nombre,
            'Apellido' => $apellido,
            'Correo' => $correo,
            'Asunto' => $asunto,
            'Mensaje' => $mensaje
        ];

        // Sentencias SQL de tipo INSERT
        $mensajeObj = new Mensaje($nombre, $apellido, $asunto, $correo, $mensaje);
        $mensajeRepository->guardar($mensajeObj);
    }
} catch (QueryException | AppException $exc) {
    $errores[] = $exc->getMessage();
}

require 'views/contact.view.php';