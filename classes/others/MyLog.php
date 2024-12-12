<?php

namespace proyecto\classes\others;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MyLog {
    private $log;

    public function __construct($rutaLogs) {
        $this->log = new Logger('name');
        $this->log->pushHandler(new StreamHandler($rutaLogs, Logger::INFO));
    }

    public function generarLog($mensaje) {
        $this->log->info($mensaje);
    }
}