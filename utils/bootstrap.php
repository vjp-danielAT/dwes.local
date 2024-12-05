<?php

// Carga determinadas configuraciones en el arranque del proyecto

require_once 'classes/database/app.class.php';
require_once 'classes/others/router.class.php';

$config = require_once 'utils/config.php';
App::bind('config', $config);