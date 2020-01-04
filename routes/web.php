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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('Layouts.dashboard');
});

Route::get('/mesa', function () {
    return view('mesa.mesa');
});

Route::get('/cardapio', 'CardapioController@index');
Route::get('/cardapio/novoprato', 'CardapioController@index');
Route::get('/cardapio/novoprato', 'CardapioController@create');

Route::get('/pedido', function () {
    return view('pedido.pedido');
});


Route::post('/cardapio', 'CardapioController@store');
Route::post('/CategoriaPrato', 'categoriaController@store');
//Route::post('/CategoriaPrato', 'categoriaController@index');
Route::get('/cardapio/categoria/excluir/{id}', 'categoriaController@destroy');