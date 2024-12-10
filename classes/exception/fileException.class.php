<?php

namespace proyecto\classes\exception;

class FileException extends Exception {
    public function __construct($mensaje) {
        parent::__construct($mensaje);
    }
}