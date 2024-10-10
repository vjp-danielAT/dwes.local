<?php

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $apellido = trim(htmlspecialchars($_POST['apellido']));
    $correo = trim(htmlspecialchars($_POST['correo']));
    $asunto = trim(htmlspecialchars($_POST['asunto']));
    $mensaje = trim(htmlspecialchars($_POST['mensaje']));

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

    $datos = [
        'Nombre' => $nombre,
        'Apellido' => $apellido,
        'Correo' => $correo,
        'Asunto' => $asunto,
        'Mensaje' => $mensaje
    ];
}

require 'views/contact.view.php';