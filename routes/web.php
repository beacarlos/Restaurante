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
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
})->name('login.view');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard.view');

Route::group(['prefix' => 'mesa'], function () {
    Route::get('/', 'mesaController@index')->name('mesa.index');
    Route::get('/ver', 'mesaController@mostrarMesas')->name('mesa.mostrarMesas');
    Route::get('/comandax', 'mesaController@mostrarComanda')->name('mesa.comanda');
    Route::get('/comandax/{id}', 'mesaController@mostracomanda')->name('mesa.comanda');
    Route::get('/mesa/pedido/excluir/{id}', 'mesaController@destroy')->name('mesa.pedido');
});

Route::group(['prefix' => 'cardapio'], function () {
    Route::get('/', 'CardapioController@index')->name('cardapio.index');
    Route::get('/novoprato', 'CardapioController@index')->name('cardapio.novoprato');
    Route::post('/novoprato', 'CardapioController@store')->name('cardapio.store');
    // Route::post('/', 'CardapioController@store');
    Route::get('/categoria/excluir/{id}', 'categoriaController@destroy')->name('cardapio.destroy');
    Route::get('/prato/excluir/{id}', 'CardapioController@destroy');
    Route::get('/prato/editar/{id}', 'CardapioController@edit');
    Route::post('/alterar/{id}', 'CardapioController@update');
});

Route::post('/CategoriaPrato', 'categoriaController@store');
//Route::post('/CategoriaPrato', 'categoriaController@index');  

Route::group(['prefix' => 'pedido'], function () {
    Route::get('/', 'pedidoController@index')->name('pedidos.index');
    Route::get('/cadastrar', 'pedidoController@novoprato')->name('pedidos.novopedido');
    Route::post('/cadastrar', 'pedidoController@store')->name('pedidos.store');
});


/*
** Grupo de rotas relacionado a gerencia.
*/
Route::group(['prefix' => 'gerencia'], function () {
    //Rota de view Gerencia.
    Route::get('/', 'GerenteController@index')->name('genrencia.index');
    Route::get('/view', 'GerenteController@mostrarFluxo')->name('genrencia.fluxo');
    Route::get('/view/comanda', 'GerenteController@mostarComanda')->name('gerencia.view.comanda');
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