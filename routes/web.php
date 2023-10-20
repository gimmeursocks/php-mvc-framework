<?php

use Core\Framework;

$app = new Framework();

$app->router::get('/', 'HomeController', 'home');
$app->router::get('/test', 'HomeController', 'mail');
$app->router::post('/', 'HomeController', 'rekt');
$app->run();