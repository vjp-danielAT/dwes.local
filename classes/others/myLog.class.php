<?php

class MyLog {
    private $log;

    public function __construct($rutaLogs) {
        $this->log = new Monolog\Logger('name');
        $this->log->pushHandler(new Monolog\Handler\StreamHandler($rutaLogs, Monolog\Logger::INFO));
    }

    public function generarLog($mensaje) {
        $this->log->info($mensaje);
    }
}