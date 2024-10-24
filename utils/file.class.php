<?php

class File
{
    private $file;
    private $fileName;

    public function __construct($fileName, $arrTypes) {

        // Guarda el fichero subido al servidor
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        if (!isset($this->file)) {
            // error
        }

        // Verifica errores durante la subida
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            switch ($this->file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    break;
                case UPLOAD_ERR_PARTIAL:
                    break;
                default:
                    break;
            }
        }

        // Comprueba si el tipo del fichero se soporta en nuestro servidor
        if (in_array($this->file['type'], $arrTypes) === false) {
            // error
        }
    }

    public function getFileName() {
        return $this->fileName;
    }
}
