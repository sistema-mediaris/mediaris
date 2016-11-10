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

Route::get('/', function () {
    return view('index');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/erro', function () {
    return view('erro');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('auth/{driver}', 'Auth\AuthController@redirectToProvider');
/*
Route::get('auth/{driver}/callback', function ($driver) {
    return view('callbackauth', ['driver' => $driver]);
});
*/
Route::get('auth/{driver}/callback', 'Auth\AuthController@handleProviderCallback'); //controller para cadastrar o usuario