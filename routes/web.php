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


Route::get('/cadastro', function () {
    return view('cadastro');
});
Route::get('/cadastro/docente', function () {
    return view('cadastro.docente');
});
Route::post('cadastro/docente', 'Auth\AuthController@insertNewDocente');


Route::get('/erro', function () {
    return view('erro');
});


Route::get('/auth/{driver}', 'Auth\AuthController@redirectToProvider');
Route::get('/auth/{driver}/callback', 'Auth\AuthController@handleProviderCallback');


Route::get('/sair', 'Auth\AuthController@logout');

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