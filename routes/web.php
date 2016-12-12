<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/erro', function () {
    return view('erro');
});

/* CADASTRO */
Route::get('/cadastro', function () {
    return view('cadastro');
});
Route::get('/cadastro/docente', function () {
    return view('cadastro.docente');
});
Route::post('cadastro/docente', 'Auth\AuthController@insertNewDocente');

// -----

/* AUTH */

Route::get('/auth/{driver}', 'Auth\AuthController@redirectToProvider');
Route::get('/auth/{driver}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/sair', 'Auth\AuthController@logout');

// -----

/* RESOURCES */

Route::get('turmas/v/{id}', 'TurmasController@showComplete');
Route::resource('turmas', 'TurmasController');
Route::resource('solicitacoes', 'SolicitacoesController');
Route::get('aluno/solicitacoes/', 'SolicitacoesController@indexForAlunos');
Route::get('aluno/solicitacoes/{id}/entregas/create', 'EntregasController@create');

Route::get('solicitacoes/{id}/entregas', 'EntregasController@indexForSolicitacoes');
Route::get('aluno/entregas/{id}', 'EntregasController@show');
Route::resource('entregas', 'EntregasController');

// -----

// Layouts avulsos

Route::get('/usuarios/criar', function () {
    return view('callbackauth');
});

Route::get('/turma', function () {
    return view('turma');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/trabalhos/criar', function () {
    return view('trabalhocriar');
});