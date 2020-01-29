<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\PessoaTipo;

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
    protected static function selectPessoa($colunas)
    {
        //Um select Join em pessoa.
        $pessoa = User::join('pessoa_tipo', 'users.pessoa_tipo_fk', '=', 'pessoa_tipo.pessoa_tipo_id')
        ->select($colunas)->get();
        
        return $pessoa;
    }
    
    /**
    * Metodo que listar as users existentes no banco e gera a tabela utilizando a biblioteca
    * DataTables.
    *
    * @return \Illuminate\Http\Response
    */
    public function mostrarUsuarios()
    {
        $pessoa = self::selectPessoa(['users.id', 'users.imagem', 'users.nome', 'users.telefone', 'users.email', 'pessoa_tipo.descricao as nivel_de_acesso']);
        
        return DataTables::of($pessoa)
        ->addColumn('action', function($pessoa){
            $button = '<a type="button" name="edit" id="edit" href="/pessoa/editar/'.$pessoa->id.'" class="edit btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<button type="button" name="delete" id="delete" onclick="deletarPessoa('.$pessoa->id.')" class="delete btn btn-sm "><i class="fas fa-trash-alt"></i></button>';
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
    public function index()
    {
        $nivel_de_acesso = $this->nivel_de_acesso();
        return view('cadastros.pessoa.pessoa', compact('nivel_de_acesso'));
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
        
        $rules_insert = [
            'uploadFile' => 'image',
            'nome' => 'required|max:50|min:5|string',
            'cpf' => 'required|unique:users|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|max:8|min:4',
            'telefone' => 'required|string|unique:users',
            'nivel_de_acesso' => 'required'
        ];
        
        $rules_update = [
            'uploadFile' => 'image',
            'nome' => 'required|max:50|min:5|string',
            'cpf' => 'required|string',
            'email' => 'required|email',
            'password' => 'max:8',
            'telefone' => 'required|string',
            'nivel_de_acesso' => 'required'
        ];
        
        if ($request->tela === 'cadastro') {
            $validator = Validator::make($request->all(), $rules_insert, $messages);
        } else {
            $validator = Validator::make($request->all(), $rules_update, $messages);
        }
        
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
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
            $pessoa = new User;
            $pessoa->nome = $request->nome;
            $pessoa->telefone = $request->telefone;
            $pessoa->cpf = $request->cpf;
            $pessoa->email = $request->email;
            $pessoa->password = Hash::make($request->password);
            $pessoa->imagem = $name;
            $pessoa->pessoa_tipo_fk = $request->nivel_de_acesso;
            $pessoa->save();
            
            return "Cadastrado com sucesso!";
        }
    }
    
    /**
    * Método que gera todos os niveis de acesso.
    */
    private function nivel_de_acesso()
    {
        return PessoaTipo::select('pessoa_tipo_id','descricao')->get();
    }
    
    /**
    * Método edita usuários já cadastrados.
    *
    * @return \Illuminate\Http\Response
    */
    protected function editarPessoaView($id)
    {
        $dados_pessoa = User::join('pessoa_tipo', 'users.pessoa_tipo_fk', '=', 'pessoa_tipo.pessoa_tipo_id')
        ->select(['users.id', 'users.imagem', 'users.nome', 'users.password', 'users.telefone', 'users.cpf', 'users.email', 'pessoa_tipo.descricao as nivel_de_acesso'])->where('users.id', '=', $id)->get();
        
        $nivel_de_acesso = $this->nivel_de_acesso();
        
        return view('cadastros.pessoa.editarPessoa', compact('dados_pessoa','nivel_de_acesso'));
    }
    
    private function editarPessoa($request)
    {
        $cpf = trim($request->cpf);
        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace(",", "", $cpf);
        $cpf = str_replace("-", "", $cpf);
        $cpf = str_replace("/", "", $cpf);

        $imagem_antiga = User::select('imagem')->where('id', $request->id)->get();
        
        if ($request->hasFile('uploadFile')) {
            //deletar a imagem antiga que tá na pasta.
            if (unlink(public_path('img_perfil/'.$imagem_antiga[0]->imagem))) {
                $imagem = $request->uploadFile;
                $name = $cpf.".".$imagem->getClientOriginalExtension();
                $destinationPath = public_path('img_perfil');
                $imagem->move($destinationPath, $name);
            } else return response()->json("Erro ao editar!", 500);
        } 
        
        $pessoa = User::find($request->id);
        $pessoa->nome = $request->nome;
        $pessoa->telefone = $request->telefone;
        $pessoa->cpf = $request->cpf;
        $pessoa->email = $request->email;

        if (!empty($request->password)) {
            $pessoa->password = Hash::make($request->password);
        }

        if ($request->hasFile('uploadFile')) {
            $pessoa->imagem = $name;
        }

        $pessoa->pessoa_tipo_fk = $request->nivel_de_acesso;
        $pessoa->save();

        return response()->json("Edição efeuada com sucesso", 200);
    }
    
    /**
    * Método que faz a desativação do usuário, utilizando a class de soft delete. 
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    protected function excluirPessoa(Request $id)
    {
        $deletar = User::find($id->id);
        $deletar->data_de_exclusao = now();
        $deletar->save();
        return response()->json(null, 200);
    }
}
