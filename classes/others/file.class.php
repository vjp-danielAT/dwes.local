<?php

require_once 'classes/exception/fileException.class.php';
require_once 'utils/const.php';

class File {
    private $file;
    private $fileName;

    public function __construct($fileName, $arrTypes) {

        // Guarda el fichero subido al servidor
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        // Si el fichero no tiene nombre es porque no hemos subido nada
        if (empty($this->file['name'])) {
            throw new FileException(getErrorString(UPLOAD_ERR_NO_FILE));
        }

        // Verifica errores durante la subida
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            switch ($this->file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new FileException(getErrorString(UPLOAD_ERR_FORM_SIZE));
                    break;
                case UPLOAD_ERR_PARTIAL:
                    throw new FileException(getErrorString(UPLOAD_ERR_PARTIAL));
                    break;
                default:
                    throw new FileException(getErrorString('UPLOAD_ERR_DEFAULT'));
                    break;
            }
        }

        // Comprueba si el tipo del fichero se soporta en nuestro servidor
        if (in_array($this->file['type'], $arrTypes) === false) {
            throw new FileException(getErrorString(UPLOAD_ERR_EXTENSION));
        }
    }

    // Guarda una imagen subida en nuestra galería
    public function saveUploadFile($rutaDestino) {

        // Comprueba que el fichero se haya subido por post
        if (is_uploaded_file($this->file['tmp_name']) === false) {
            throw new FileException(getErrorString('UPLOAD_ERR_NO_FORM'));
        }

        $this->fileName = $this->file['name'];
        $ruta = $rutaDestino . $this->fileName;

        /* Si existe el fichero en nuestra galería, le asignamos un número
        al final del nombre */
        if (is_file($ruta)) {
            $i = 1;

            /* Busco la posición del último punto existente en el nombre del
            fichero, que será el que precede al tipo de extensión del mismo,
            e introduzco el substring '(1)' en dicha posición. Por ejemplo,
            imagen.jpg pasaría a llamarse imagen(1).jpg */
            $this->fileName = substr_replace($this->fileName, '(' . $i . ')', strrpos($this->fileName, '.'), 0);

            // Compruebo que tampoco exista ese fichero
            while (is_file($rutaDestino . $this->fileName)) {
                $i++;

                /* Como ese fichero también existía, ahora reemplazo el número
                entre paréntesis por la siguiente cifra. Por ejemplo,
                imagen(10).jpg pasaría a llamarse imagen(11).jpg */
                $this->fileName = substr_replace($this->fileName, $i, strrpos($this->fileName, $i - 1), strlen($i - 1));
            }

            $ruta = $rutaDestino . $this->fileName;
        }

        // Devuelve false si no logra mover el fichero
        if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
            throw new FileException(getErrorString('UPLOAD_ERR_NO_MOVE'));
        }
    }

    // Copia una imagen del directorio gallery a portfolio
    public function copyFile ($rutaOrigen, $rutaDestino) {
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;

        if (is_file($origen) === false) {
            throw new FileException("No existe el fichero $origen que intentas copiar");
        }

        if (is_file($destino)) {
            throw new FileException("El fichero $destino ya existe y no se puede sobreescribir");
        }

        if (copy($origen, $destino) === false) {
            throw new FileException("No se ha podido copiar el fichero $origen a $destino");
        }
    }

    public function getFileName() {
        return $this->fileName;
    }
}