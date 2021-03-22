<?php

require './vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface as Requeste;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();

// Padrão PSR7
$app->post('/usuarios/adicionar', function (Requeste $request, Response $response) {
    //Recuperar o POST
    $post = $request->getParsedBody();
    $nome = $post['nome'];
    $email = $post['email'];

    /*Salvar no baco de dados com INSERT INTO...
    ....... 
    */

    return $response->getBody()->write("Dados Salvos com Sucesso");
});

$app->put('/usuarios/atualizar', function (Requeste $request, Response $response) {
    //Atualiza os dados
    $post = $request->getParsedBody();
    $id = $post['id_usuario'];
    $nome = $post['nome'];
    $email = $post['email'];

    /*Atualizar no baco de dados com UPDATE...
    ....... 
    */

    return $response->getBody()->write("Dados Atualizados com Sucesso");
});

$app->delete('/usuarios/remover/{id}', function (Requeste $request, Response $response) {
    //Apaga os dados
    $id = $request->getAttribute('id');

    /*Apaga os dados no baco de dados com DELETE...
    ....... 
    */

    return $response->getBody()->write("Dados Deletados com Sucesso");
});

$app->run();
