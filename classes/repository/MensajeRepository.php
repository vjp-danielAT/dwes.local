<?php

namespace proyecto\classes\repository;

use proyecto\classes\database\QueryBuilder;
use proyecto\classes\entity\Mensaje;

class MensajeRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('mensajes', Mensaje::class);
    }

    // Guarda un mensaje en la BD usando transacciones
    public function guardar($mensaje) {
        $guardarMensaje = function() use ($mensaje) {
            $this->save($mensaje);
        };

        $this->transaccion($guardarMensaje);
    }
}