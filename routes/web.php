<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Layouts.dashboard');
});

Route::get('/mesa', function () {
    return view('mesa.mesa');
});

Route::get('/cardapio', 'CardapioController@index');
Route::get('/cardapio/novoprato', 'CardapioController@index');
Route::post('/cardapio/novoprato', 'CardapioController@store');
Route::post('/cardapio', 'CardapioController@store');
Route::get('/cardapio/categoria/excluir/{id}', 'categoriaController@destroy');

Route::post('/CategoriaPrato', 'categoriaController@store');
//Route::post('/CategoriaPrato', 'categoriaController@index');  

Route::get('/pedido', function () {
    return view('pedido.pedido');
});

//Rota gerencia
Route::group(['prefix' => 'gerencia'], function () {
    Route::get('/', 'GerenteController@index');
});
