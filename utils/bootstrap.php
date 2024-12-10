<?php

// Carga determinadas configuraciones en el arranque del proyecto

require_once 'classes/database/app.class.php';
require_once 'classes/others/router.class.php';
require_once 'classes/others/myLog.class.php';
require_once 'vendor/autoload.php';

$config = require_once 'utils/config.php';
App::bind('config', $config);

$logger = new MyLog('logs/proyecto.log');
App::bind('logger', $logger);