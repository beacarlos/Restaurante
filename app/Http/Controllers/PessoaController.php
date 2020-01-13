<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Pessoa;

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
    
    public function mostrarUsuarios()
    {
        //Um Select Join em pessoa.
        $pessoa = Pessoa::join('pessoa_tipo', 'pessoas.pessoa_tipo_fk', '=', 'pessoa_tipo.pessoa_tipo_id')
        ->select('pessoas.pessoa_id', 'pessoas.imagem', 'pessoas.nome', 'pessoas.telefone', 'pessoas.email', 'pessoa_tipo.descricao as nivel_de_acesso')
        ->get();
        
        return DataTables::of($pessoa)
        ->addColumn('action', function($pessoa){
            $button = '<button type="button" name="edit" id="'.$pessoa->pessoa_id.'" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<button type="button" name="delete" id="'.$pessoa->pessoa_id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
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
        $cpf = trim($request->cpf);
        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace(",", "", $cpf);
        $cpf = str_replace("-", "", $cpf);
        $cpf = str_replace("/", "", $cpf);
        
        if ($request->hasFile('uploadFile')) {
            $imagem = $request->uploadFile;
            $name = $cpf.".".$imagem->getClientOriginalExtension();
            $destinationPath = public_path('img_perfil');
            $imagem->move($destinationPath, $name);
            
            //inserção da pessoa no banco de dados
            $pessoa = new Pessoa;
            $pessoa->nome = $request->nome;
            $pessoa->telefone = $request->telefone;
            $pessoa->cpf = $request->cpf;
            $pessoa->email = $request->email;
            $pessoa->senha = Hash::make($request->password);
            $pessoa->imagem = $name;
            $pessoa->pessoa_tipo_fk = $request->nivel_de_acesso;
            $pessoa->save();
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
