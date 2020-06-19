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

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

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

//mike
$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('/', 'AdminController@index');
    $router->get('/{codAdmin}', 'AdminController@show');
    $router->post('/', 'AdminController@store');
    $router->post('/authenticate', 'AdminController@authenticate');
    $router->put('/{codAdmin}', 'AdminController@update');
});

$router->group(['prefix' => 'atividade'], function () use ($router) {
   $router->get('/', 'AtividadeController@index');
   $router->get('/{codAtividade}', 'AtividadeController@show');
   $router->post('/', 'AtividadeController@store');
   $router->put('/{codAtividade}', 'AtividadeController@update');
});

$router->group(['prefix' => 'categoria'], function () use ($router) {
    $router->get('/','CategoriaController@index');
    $router->get('/{codCategoria}','CategoriaController@show');
    $router->post('/','CategoriaController@store');
    $router->put('/{codCategoria}','CategoriaController@update');
});

$router->group(['prefix' => 'passo-atividade'], function () use ($router) {
    $router->get('/', 'PassoAtividadeController@index');
    $router->get('/{codPassoAtividade}', 'PassoAtividadeController@show');
    $router->post('/', 'PassoAtividadeController@store');
    $router->put('/{codPassoAtividade}', 'PassoAtividadeController@update');

});