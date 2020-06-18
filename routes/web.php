<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'atividade'], function () use ($router) {
    $router->get('{codAtividade}/publicacoes', 'PublicacaoController@index');
    $router->get('{codAtividade}/salas', 'SalaController@index');
});

$router->group(['prefix' => 'curtida'], function () use ($router) {
    $router->post('/', 'CurtidaPublicacaoController@store');
    $router->delete('/{codUsuario}/{codPublicacao}', 'CurtidaPublicacaoController@destroy');
});

$router->group(['prefix' => 'publicacoes'], function () use ($router) {
    $router->post('/', 'PublicacaoController@store');
    $router->put('/{codPublicacao}', 'PublicacaoController@update');
    $router->delete('/{codPublicacao}', 'PublicacaoController@destroy');
});

$router->group(['prefix' => 'sala'], function () use ($router) {
    $router->post('/', 'SalaController@store');
    $router->put('/{codSala}', 'SalaController@update');
    $router->delete('/{codSala}', 'SalaController@destroy');
});

$router->group(['prefix' => 'usuario'], function () use ($router) {
    $router->get('/', 'UsuarioController@index');
    $router->post('/', 'UsuarioController@store');
    $router->put('/{codUsuario}', 'UsuarioController@update');
    $router->delete('/{codUsuario}', 'UsuarioController@destroy');

    $router->post('/sala', 'ParticipanteSalaController@store');
    $router->delete('/sala/{codUsuario}/{codSala}', 'ParticipanteSalaController@destroy');
});
