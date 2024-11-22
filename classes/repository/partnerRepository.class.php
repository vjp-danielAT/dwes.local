<?php

require_once 'classes/database/queryBuilder.class.php';

class PartnerRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('asociados', 'Partner');
    }

    /* Guarda un asociado en la BBDD usando transacciones */
    public function guardar($asociado) {
        $guardarAsociado = function() use ($asociado) {
            $this->save($asociado);
        };

        $this->transaccion($guardarAsociado);
    }
}