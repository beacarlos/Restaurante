<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mesa;
use App\Pedido;
use App\Comanda;



class mesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mesa.mesa');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    protected function mostrarMesas()
    {
        $mesas = Mesa::select('mesa_id', 'nome', 'disponibilidade')->get();
        // return $mesas;
        return response()->json($mesas, 200);
    }
    public function mostrarComanda(){

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
    
    }
    public function mostracomanda($id){
        $mesa = DB::select('SELECT comanda_id FROM comandas WHERE mesa_fk = ?',[$id]);
        $mesa = intval($mesa);
        if(isset($mesa)){
            $comandax = DB::select('SELECT pedidos.quantidade, pedidos.preco_total, pratos.nome FROM pratos, pedidos WHERE pedidos.comanda_fk= ?', [$mesa]);
            return view('mesa.comanda', compact('comandax'));
        }
        return view('mesa.comanda');
    }
}
