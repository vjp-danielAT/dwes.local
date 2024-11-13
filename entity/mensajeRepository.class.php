<?php

require_once 'entity/queryBuilder.class.php';

class MensajeRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('mensajes', 'Mensaje');
    }

    /* Guarda un mensaje en la BBDD usando transacciones */
    public function guardar($mensaje) {
        $guardarMensaje = function() use ($mensaje) {
            $this->save($mensaje);
        };

        $this->transaccion($guardarMensaje);
    }
}