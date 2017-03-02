<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//autochargement des classes
require '../vendor/autoload.php';

//configuration
require '../app/config.php';

// rares fonctions globales
require '../W/globals.php';

//instancie notre appli en lui passant la config et les routes
$app = new W\App($w_routes, $w_config);

//exécute l'appli
$app->run();