<?php

include 'config.php';

@define('PATH_FRAMEWORK', $config['path_system']);

defined('PATH_FRAMEWORK') or die("No se encontro PATH_FRAMEWORK");

include PATH_FRAMEWORK . '/http/AppServer.php';
include PATH_FRAMEWORK . '/http/REST_Controller.php';


use kllmp\Api\Http\AppServer;

$app = new AppServer();
$app->run(IGNORE_URI);