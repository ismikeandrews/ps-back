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

    $router->delete('{codAtividade}/publicacoes/{codNivelUsuario}', 'PublicacaoController@destroy');
});

$router->group(['prefix' => 'curtida'], function () use ($router) {
    $router->post('/', 'CurtidaPublicacaoController@store');
    $router->delete('/{codUsuario}/{codPublicacao}', 'CurtidaPublicacaoController@destroy');
});

$router->group(['prefix' => 'publicacoes'], function () use ($router) {
    $router->post('/', 'PublicacaoController@store');
    $router->put('/{codPublicacao}', 'PublicacaoController@update');
});

$router->group(['prefix' => 'usuario'], function () use ($router) {
    $router->post('/sala', 'ParticipanteSalaController@store');
    $router->delete('/sala/{codUsuario}/{codSala}', 'ParticipanteSalaController@destroy');
});
