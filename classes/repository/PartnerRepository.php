<?php

namespace proyecto\classes\repository;

use proyecto\classes\database\QueryBuilder;
use proyecto\classes\entity\Partner;

class PartnerRepository extends QueryBuilder {
    public function __construct() {
        parent::__construct('asociados', Partner::class);
    }

    // Guarda un asociado en la BD usando transacciones
    public function guardar($asociado) {
        $guardarAsociado = function() use ($asociado) {
            $this->save($asociado);
        };

        $this->transaccion($guardarAsociado);
    }
}