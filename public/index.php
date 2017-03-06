<?php

//autochargement des classes
require '../vendor/autoload.php';

//configuration
require '../app/config.dist.php';
$w_config_dist = $w_config;

require '../app/config.php';
$w_config += $w_config_dist;

// rares fonctions globales
require '../W/globals.php';

//instancie notre appli en lui passant la config et les routes
$app = new W\App($w_routes, $w_config);

//exécute l'appli
$app->run();