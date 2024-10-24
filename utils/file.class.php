<?php

require_once __DIR__ . '/../exceptions/fileException.class.php';

class File {
    private $file;
    private $fileName;

    public function __construct($fileName, $arrTypes) {

        // Guarda el fichero subido al servidor
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        if (!isset($this->file)) {
            throw new FileException('Debes seleccionar un fichero');
        }

        // Verifica errores durante la subida
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            switch ($this->file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new FileException('El fichero es demasiado grande');
                    break;
                case UPLOAD_ERR_PARTIAL:
                    throw new FileException('No se ha podido subir el fichero completo');
                    break;
                default:
                    throw new FileException('No se ha podido subir el fichero');
                    break;
            }
        }

        // Comprueba si el tipo del fichero se soporta en nuestro servidor
        if (in_array($this->file['type'], $arrTypes) === false) {
            throw new FileException('Tipo de fichero no soportado');
        }
    }

    public function getFileName() {
        return $this->fileName;
    }
}
