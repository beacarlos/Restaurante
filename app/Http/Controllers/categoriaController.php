<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CategoriaPrato;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categs = CategoriaPrato::all();
        return view('cardapio.cardapio', compact('categs'));
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
        $cat = new CategoriaPrato();
        $cat->descricao = $request->input('nomeCat');
        $cat->save();
        return redirect('/cardapio');
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
        $cat = CategoriaPrato::find($id);
        if(isset($cat)){
            return view('editarcategoria', compact('cat'));
        }
        return redirect('/cardapio');
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
        $message = '';
        $categs = CategoriaPrato::find($id);
        $exist =  DB::select('SELECT * FROM pratos WHERE categoria_prato_fk = ?', [$id]);
        if(isset($categs) && count($exist)==0){
            $categs->delete();
        }else{
            $message = True;
        }
        return redirect('/cardapio')->with(compact('message'));
    }
    
}
