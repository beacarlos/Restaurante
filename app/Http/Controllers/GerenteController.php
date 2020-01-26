<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Comanda;
use App\Pedido;

class GerenteController extends Controller
{
    /**
    * Mostra a view principal do controller.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('gerente.gerente');
    }
    
    /**
    * Mostra uma tabela com todas as mesas com comandas abertas e o valor total de consumo.
    *
    * @return \Illuminate\Http\Response
    */
    public function mostrarFluxo()
    {
        $fluxo = DB::select('SELECT comandas.comanda_id, mesas.nome as mesa, comandas.data_de_criacao as data, sum(pedidos.preco_total) as preco_total
        from comandas
        inner join mesas on comandas.mesa_fk = mesas.mesa_id 
        inner join pedidos on comandas.comanda_id = pedidos.comanda_fk 
        WHERE comandas.status = 1
        GROUP BY comandas.comanda_id;');
        
        return DataTables::of($fluxo)
        ->addColumn('action', function($fluxo){
            $button = '<button type="button" name="edit" id="edit" onclick="verComanda('.$fluxo->comanda_id.')" class="edit btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    
    public function mostarComanda(Request $comanda_id)
    {
        $comanda['pedidos'] = DB::table('pedidos')->join('pratos', 'pedidos.prato_fk', '=', 'pratos.prato_id')
        ->select('pratos.nome', 'pedidos.quantidade', 'pratos.preco as preco', 'pedidos.preco_total as preco_total')
        ->where('pedidos.comanda_fk', $comanda_id->comanda_id)->get();
        
        $comanda['valor_total'] = DB::select("SELECT sum(pedidos.preco_total) as preco_total from comandas INNER JOIN pedidos on comandas.comanda_id = pedidos.comanda_fk WHERE comandas.status = :status and pedidos.comanda_fk = :comanda_id GROUP BY comandas.comanda_id", ["status"=> 1, "comanda_id" => $comanda_id->comanda_id]);

        // return $comanda;
        return response()->json($comanda, 200);
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
