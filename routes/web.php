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
})->name('mesa.index');

Route::group(['prefix' => 'cardapio'], function () {
    Route::get('/', 'CardapioController@index')->name('cardapio.index');
    Route::get('/novoprato', 'CardapioController@index')->name('cardapio.novoprato');
    Route::post('/novoprato', 'CardapioController@store')->name('cardapio.store');
    // Route::post('/', 'CardapioController@store');
    Route::get('/categoria/excluir/{id}', 'categoriaController@destroy')->name('cardapio.destroy');
});

Route::post('/CategoriaPrato', 'categoriaController@store');
//Route::post('/CategoriaPrato', 'categoriaController@index');  

Route::get('/pedido', function () {
    return view('pedido.pedido');
})->name('pedidos.index');

//Rota gerencia
Route::group(['prefix' => 'gerencia'], function () {
    Route::get('/', 'GerenteController@index')->name('genrencia.index');
});
