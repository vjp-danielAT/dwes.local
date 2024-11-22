<?php

// Retorna el mensaje de error a mostrar
function getErrorString($error) {
    $errorDevuelto = match ($error) {
        // Clase File
        UPLOAD_ERR_OK => '',
        UPLOAD_ERR_INI_SIZE => 'El fichero es demasiado grande',
        UPLOAD_ERR_FORM_SIZE => 'El fichero es demasiado grande',
        UPLOAD_ERR_PARTIAL => 'No se ha podido subir el fichero completo',
        UPLOAD_ERR_NO_FILE => 'Debes seleccionar un fichero',
        UPLOAD_ERR_NO_TMP_DIR => '',
        UPLOAD_ERR_CANT_WRITE => '',
        UPLOAD_ERR_EXTENSION => 'Tipo de fichero no soportado',
        'UPLOAD_ERR_DEFAULT' => 'No se ha podido subir el fichero',
        'UPLOAD_ERR_NO_FORM' => 'El archivo no se ha subido mediante el formulario',
        'UPLOAD_ERR_NO_MOVE' => 'No se puede mover el fichero a su destino',

        // Clase App
        'KEY_NOT_FOUND' => 'No se ha encontrado la clave en el contenedor',

        // Clase QueryBuilder
        'QUERY_ERROR' => 'No se ha podido ejecutar la consulta',
        'ITEM_NOT_FOUND' => 'No se ha encontrado ningún elemento con el id ',
        'INSERT_ERROR' => 'Error al insertar en la BD',
        'TRANSACTION_ERROR' => 'No se ha podido realizar la operación',
        'UPDATE_ERROR' => 'Error al actualizar'
    };

    return $errorDevuelto;
}
