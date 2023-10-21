<?php

use Core\Framework;

$app = new Framework();

$app->router::get('/', 'HomeController', 'home');
$app->router::get('/mail', 'HomeController', 'mail');
$app->router::get('/test', 'HomeController', 'form_test');
$app->router::post('/pp', 'HomeController', 'post_test');
$app->run();