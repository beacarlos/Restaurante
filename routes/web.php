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
    return view('dashboard.dashboard');
})->name('dashboard.view');

Route::get('/mesa', function () {
    return view('mesa.mesa');
})->name('mesa.index');

Route::group(['prefix' => 'cardapio'], function () {
    Route::get('/', 'CardapioController@index')->name('cardapio.index');
    Route::get('/novoprato', 'CardapioController@index')->name('cardapio.novoprato');
    Route::post('/novoprato', 'CardapioController@store')->name('cardapio.store');
    // Route::post('/', 'CardapioController@store');
    Route::get('/categoria/excluir/{id}', 'categoriaController@destroy')->name('cardapio.destroy');
    Route::get('/prato/excluir/{id}', 'CardapioController@destroy');
});

Route::post('/CategoriaPrato', 'categoriaController@store');
//Route::post('/CategoriaPrato', 'categoriaController@index');  

Route::get('/pedido', function () {
    return view('pedido.pedido');
})->name('pedidos.index');


/*
** Grupo de rotas relacionado a gerencia.
*/
Route::group(['prefix' => 'gerencia'], function () {
    //Rota de view Gerencia.
    Route::get('/', 'GerenteController@index')->name('genrencia.index');
});


/*
** Grupo de rotas relacionada a pessoas.
*/
Route::group(['prefix' => 'pessoa'], function () {
    //Rota da view Pessoa Listagem.
    Route::get('/listagem', 'PessoaController@indexListagem')->name('pessoa.listagem.view');
    Route::get('/listagem/view', 'PessoaController@mostrarUsuarios')->name('pessoa.listagem.datatables');
    //Rota da view Pessoa.
    Route::get('/cadastro', 'PessoaController@index')->name('pessoa.view');
    Route::post('/cadastrar', 'PessoaController@validacaoFormCadastro')->name('pessoa.cadastro');
    Route::get('/editar/{id}', 'PessoaController@editarPessoaView')->name('pessoa.editar');
    Route::post('/excluir', 'PessoaController@excluirPessoa')->name('pessoa.exluir');
});
