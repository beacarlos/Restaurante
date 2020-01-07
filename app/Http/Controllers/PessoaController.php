<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function indexListagem ()
    {
        return view('cadastros.pessoa.pessoa-listagem');
    }

    public function index ()
    {
        return view('cadastros.pessoa.pessoa');
    }
}
