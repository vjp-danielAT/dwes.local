<?php

require_once 'classes/interface/iEntity.class.php';

class Mensaje implements IEntity {
    private $id;
    private $nombre;
    private $apellidos;
    private $asunto;
    private $email;
    private $texto;
    private $fecha;

    // Constructor

    public function __construct($nombre = '', $apellidos = '', $asunto = '', $email = '', $texto = '') {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->asunto = $asunto;
        $this->email = $email;
        $this->texto = $texto;
        $this->fecha = new DateTime();
    }

    // Devuelve un array con los datos del objeto

    public function toArray() {
        return [
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'asunto' => $this->asunto,
            'email' => $this->email,
            'texto' => $this->texto,
            'fecha' => $this->fecha->format('Y-m-d H:i:s')
        ];
    }
}