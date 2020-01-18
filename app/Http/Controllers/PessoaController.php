<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
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
    
    /**
    * Metodo faz um select em pessoa.
    *
    * @return \Illuminate\Http\Response
    */
    protected function selectPessoa($colunas)
    {
        //Um select Join em pessoa.
        $pessoa = Pessoa::join('pessoa_tipo', 'pessoas.pessoa_tipo_fk', '=', 'pessoa_tipo.pessoa_tipo_id')
        ->select($colunas)->get();
        
        return $pessoa;
    }
    
    /**
    * Metodo que listar as pessoas existentes no banco e gera a tabela utilizando a biblioteca
    * DataTables.
    *
    * @return \Illuminate\Http\Response
    */
    public function mostrarUsuarios()
    {
        $pessoa = $this->selectPessoa(['pessoas.pessoa_id', 'pessoas.imagem', 'pessoas.nome', 'pessoas.telefone', 'pessoas.email', 'pessoa_tipo.descricao as nivel_de_acesso']);
        
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
    * Método faz um validação no dados trazidos do formulário.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function validacaoFormCadastro(Request $request)
    {
        $messages = [
            'uploadFile.image' => 'Tem que ser arquivos de imagem.',
            'required' => 'O campo :attribute não pode ser vazio.',
            'password.required' => 'O campo senha não pode ser vazio.',
            'nivel_de_acesso.required' => 'Selecione uma opção para nivel de acesso.',
            'nome.max' => 'O campo nome tem tamanho máximo de 50 caracteres.',
            'password.max' => 'O campo senha tem tamanho máximo de 8 caracteres.',
            'nome.min' => 'O campo nome tem tamanho minimo de 5 caracteres.',
            'password.min' => 'O campo senha tem tamanho minimo de 8 caracteres.',
            'string' => 'O campo :attribute tem que ser caracteres.',
            'email' => 'O campo :attribute tem que ser preenchido com um e-mail valido.',
            'cpf.unique'=>'Esse cpf já pertence a um usúario cadastrado!',
            'email.unique'=>'Esse email já pertence a um usúario cadastrado!',
            'telefone.unique'=>'Esse telefone já pertence a um usúario cadastrado!'
        ];
        
        $validator = Validator::make($request->all(), [
            'uploadFile' => 'image',
            'nome' => 'required|max:50|min:5|string',
            'cpf' => 'required|unique:pessoas|string',
            'email' => 'required|email|unique:pessoas',
            'password' => 'required|string|max:8|min:8',
            'telefone' => 'required|string|unique:pessoas',
            'nivel_de_acesso' => 'required'
        ], $messages);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {
            if ($request->tela === 'cadastro') {
                return $this->cadastrarPessoa($request);    
            } else {
                return $this->editarPessoa($request);
            }
        }
    }
    
    /**
    * Método que cadastra os usuários.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    private function cadastrarPessoa($request)
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
            
            return "Cadastrado com sucesso!";
        }
    }
    
    /**
    * Método edita usuários já cadastrados.
    *
    * @return \Illuminate\Http\Response
    */
    private function editarPessoa($request)
    {
        # code...
    }
    
    
    /**
    * Método que faz a desativação do usuário, utilizando a class de soft delete. 
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function excluirPessoa(Request $request)
    {
        # code...
    }
}
