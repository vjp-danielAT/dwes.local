<?php

// Carga determinadas configuraciones en el arranque del proyecto

use proyecto\classes\database\App;
use proyecto\classes\others\MyLog;
require_once 'vendor/autoload.php';

$config = require_once 'utils/config.php';
App::bind('config', $config);

$logger = new MyLog('logs/proyecto.log');
App::bind('logger', $logger);