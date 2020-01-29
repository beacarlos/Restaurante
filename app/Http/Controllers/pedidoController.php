<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Prato;
use App\Comanda;
use App\Pedido;

class pedidoController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $pratos = Prato::all();
        $dados_comandas = Comanda::all();

        $pedidos = DB::select('SELECT pratos.nome, mesas.mesa_id, mesas.nome as mesa,comandas.comanda_id,  pedidos.status, pedidos.quantidade  from pedidos 
        inner JOIN comandas on comandas.comanda_id
        inner JOIN mesas on mesas.mesa_id = comandas.mesa_fk
        inner JOIN pratos on pratos.prato_id = pedidos.prato_fk
        WHERE comandas.status = 1');

        $comandas = DB::table('comandas')->select()->where('status', 1)->count();
        
        return view("pedido.pedido", compact('pedidos', 'comandas', 'pratos', 'dados_comandas'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

        /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function novoprato()
    {
        $pratos = Prato::all();
        $dados_comandas = Comanda::all();

        return view("pedido.cadastrar",compact('pratos', 'dados_comandas'));
        
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->quantidade = $request->input('quantidade');
        $pedido->status = 1;
        $pedido->preco_total= 50;
        $pedido->comanda_fk=$request->input('comanda');
        $pedido->prato_fk = $request->input('prato');
        $pedido->save();

        return redirect('/pedido');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
