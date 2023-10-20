<?php

use Core\Framework;

$app = new Framework();

$app->router::get('/', 'HomeController', 'test');
$app->router::get('/bob', 'HomeController', 'rekt');
$app->router::post('/', 'HomeController', 'rekt');
$app->run();