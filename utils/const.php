<?php

function getErrorString($error) {
    $errorDevuelto = match ($error) {
        UPLOAD_ERR_OK => '',
        UPLOAD_ERR_INI_SIZE => 'El fichero es demasiado grande',
        UPLOAD_ERR_FORM_SIZE => 'El fichero es demasiado grande',
        UPLOAD_ERR_PARTIAL => 'No se ha podido subir el fichero completo',
        UPLOAD_ERR_NO_FILE => 'Debes seleccionar un fichero',
        UPLOAD_ERR_NO_TMP_DIR => '',
        UPLOAD_ERR_CANT_WRITE => '',
        UPLOAD_ERR_EXTENSION => 'Tipo de fichero no soportado',
        // Personalizados
        'UPLOAD_ERR_DEFAULT' => 'No se ha podido subir el fichero',
        'UPLOAD_ERR_NO_FORM' => 'El archivo no se ha subido mediante el formulario',
        'UPLOAD_ERR_NO_MOVE' => 'No se puede mover el fichero a su destino'
    };

    return $errorDevuelto;
}
