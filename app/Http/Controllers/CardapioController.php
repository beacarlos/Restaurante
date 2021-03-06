<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Prato;
use App\CategoriaPrato;

class CardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categs = CategoriaPrato::all();
        $prat = Prato::all();
        return view('cardapio.cardapio', compact('categs', 'prat'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cardapio.cardapio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request->name, 200);
        if ($request->hasFile('uploadFile')) {
            $imagem = $request->uploadFile;
            $name = $request->name.".".$imagem->getClientOriginalExtension();
            $destinationPath = public_path('img_pratos');
            $imagem->move($destinationPath, $name);
            
            $prat = new Prato();
            $prat->nome = $request->input('name');
            $prat->preco = $request->input('price');
            $prat->categoria_prato_fk = $request->input('descricaoCat');
            $prat->descricao = $request->input('descricao');
            $prat->imagem = $name;
            $prat->save();
            
            return "Cadastrado prato com sucesso!";
        }


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
        $prat = Prato::find($id);
        $categs = CategoriaPrato::all();
        if(isset($prat)){
            return view('cardapio.prato', compact('prat', 'categs'));
        }
        return redirect('cardapio.cardapio');
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
        $prat = Prato::find($id);
        if(isset($prat)){
            $prat->nome = $request->input('name');
            $prat->preco = $request->input('price');
            $prat->categoria_prato_fk=$request->input('descricaoCat');
            $prat->descricao = $request->input('descricao');
            $prat->save();
        }
        return redirect('/cardapio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $prato = Prato::find($id);
        if(isset($prato)){
            unlink(public_path('img_pratos/'.$prato->imagem));
            $prato->delete();
        }
        return redirect('/cardapio');
    }
}
