<?php

require './vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface as Requeste;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

//Container dependency injection

class Servico
{
}

//Container Pimple
$container = $app->getContainer();
$container['Home'] = function () {
    return new App\Controllers\Home(new \App\Views\View);
};

//Usando Controllers
//$app->get('/usuario', '\App\Controllers\Home:index');
$app->get('/usuario', 'Home:index');

$app->run();
