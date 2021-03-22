<?php

require './vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface as Requeste;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

//Tipos de respostas 
//cabeçalho, text, json, xml

$app->get('/header', function (Requeste $request, Response $response) {
    //Retornar texto
    $response->write('Esse é o retorno header');
    return $response->withHeader('allow', 'PUT')
        ->withAddedHeader('Content-Length', 10);
});

$app->get('/json', function (Requeste $request, Response $response) {
    //Retornar json
    return $response->withJson([
        "nome" => "João Vitor"
    ]);
});

$app->get('/xml', function (Requeste $request, Response $response) {
    //Retornar xml
    $xml = file_get_contents('arquivo.xml');
    $response->write($xml);

    return $response->withHeader('Content-Type', 'application/xml');
});

$app->run();
