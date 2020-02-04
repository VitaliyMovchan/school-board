<?php
// index.php
spl_autoload_register();

//Include bootstrap Application
require_once 'bootstrap.php';
// Include Composer Autoload (relative to project root)
require_once 'vendor/autoload.php';
// Include Application
require_once 'app.php';

// Include configuration file
include 'config.php';

$app = new App();
$app->run();
