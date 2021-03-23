<?php

require './vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();
$container['db'] = function (){
    $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'slim',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

//Database
$app->get('/usuarios', function (Request $request, Response $response){
    $db = $this->get('db');
    //Cria a Tabela
    /*$db->schema->dropIfExists('usuarios');
    $db->schema->create('usuarios', function ($table){
        $table->increments('id');
        $table->string('nome');
        $table->string('email');
        $table->timestamps();
    });

    //Insere dados na tabela
    $db->table('usuarios')->insert([
        'nome' => 'Nome',
        'email' => 'E-mail'
    ]);

    //Atualizar dados na tabela
    $db->table('usuarios')
        ->where('id', 1)
        ->update([
            'nome' => 'Nome 3'
        ]);

    //Deletar dados na tabela
    $db->table('usuarios')
        ->where('id', 2)
        ->delete();*/

    //Listar usuarios
    $usuarios = $db->table('usuarios')->get();
    foreach ($usuarios as $usuario) {
        echo $usuario->nome . '<br>';
    }
});

$app->run();
