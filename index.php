<?php

require './vendor/autoload.php';

$app = new \Slim\App();

$app->get('/postagens', function () {

    echo 'Lista de Postagens';
});

$app->get('/perfil[/{id}]', function ($request, $response) {
    $id = $request->getAttribute('id');
    echo "Seu ID: " . $id;
});

$app->get('/lista_postagens[/{dia}[/{mes}[/{ano}]]]', function ($request, $response) {
    $dia = $request->getAttribute('dia');
    $mes = $request->getAttribute('mes');
    $ano = $request->getAttribute('ano');

    echo "Data da postagem: " . $dia . '/' . $mes . '/' . $ano;
})->setName("datas");

$app->get('/meusite', function ($request, $response) {
    $retorno = $this->get("router")->pathFor("datas", ["dia" => "02", "mes" => "10", "ano" => "2020"]);
    echo $retorno;
});

$app->get('/lista/{itens:.*}', function ($request, $response) {
    $itens = $request->getAttribute('itens');
    var_dump(explode("/", $itens));
});

$app->run();
