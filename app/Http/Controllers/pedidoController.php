<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pedidoController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $pedidos = DB::table('pedidos')->select('pedido_id', 'quantidade',
        //  'status', 'preco_total' , 'comanda_fk' , 'prato_fk', 'data_de_criacao', 
        //  'ultima_atualizacao')->get();
        
        //  $pedidos = DB::table('pedidos')->join('pratos', 'pedidos.prato_fk', '=', 'pratos.prato_id')
        //  ->join('comandas', 'comandas.comanda_id', '=', 'pedidos.comanda_fk')
        // ->select('pratos.nome', 'comandas.mesa_fk', 'pedidos.quantidade', 'pratos.preco as preco', 'pedidos.preco_total as preco_total')->get();
        
        $pedidos = DB::select('SELECT pratos.nome, mesas.mesa_id, mesas.nome as mesa,comandas.comanda_id,  pedidos.status, pedidos.quantidade  from pedidos 
        inner JOIN comandas on comandas.comanda_id
        inner JOIN mesas on mesas.mesa_id = comandas.mesa_fk
        inner JOIN pratos on pratos.prato_id = pedidos.pedido_id
        WHERE comandas.status = 1');

        $comandas = DB::table('comandas')->select()->where('status', 1)->count();
        
        //  return $comandas;
        return view("pedido.pedido", compact('pedidos', 'comandas'));
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
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
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
