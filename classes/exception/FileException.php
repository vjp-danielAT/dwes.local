<?php

namespace proyecto\classes\exception;

use Exception;

class FileException extends Exception {
    public function __construct($mensaje) {
        parent::__construct($mensaje);
    }
}