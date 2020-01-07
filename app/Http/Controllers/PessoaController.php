<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
    * Metodo que retorna a view que lista os usuários já cadastrados.
    *
    * @return \Illuminate\Http\Response
    */
    public function indexListagem ()
    {
        return view('cadastros.pessoa.pessoa-listagem');
    }
    
    /**
    * Metodo que retorna a view cadastra os usuario.
    *
    * @return \Illuminate\Http\Response
    */
    public function index ()
    {
        return view('cadastros.pessoa.pessoa');
    }
    
    /**
    * Método que cadastra os usuários.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function cadastrarPessoa(Request $request)
    {
        if ($request->hasFile('uploadFile')) {
            foreach ($request->uploadFile as $arquivo) {
                $image = $arquivo;
                $name = $request->nome.".".$imagem->getClientOriginalExtension();
                $destinationPath = public_path('img_perfil');
                $image->move($destinationPath, $name);
                // if ($image->move($destinationPath, $name)) {
                //     return response()->json("hdjjghd");
                // }
            }
        }
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
