<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    /**
    * Colunas que é permitidos inserção em massa.
    * @var array
    */
    protected $fillable = [
        'pessoa_id', 'nome', 'telefone', 'cpf', 'email', 'pessoa_tipo_fk', 'data_de_criacao', 'ultima_atualizacao'
    ];
    
    /**
    * Colunas que precisam de segurança maior.
    * @var array
    */
    protected $hidden = ['senha'];
    
    /**
    * Coluna created_at timestamp modificada.
    * @var string
    */
    const CREATED_AT = 'data_de_criacao';
    
    /**
    * Coluna last_update timestamp modificada.
    * @var string
    */
    const UPDATED_AT = 'ultima_atualizacao';
    
    /**
    * A tabela mysql associada ao model.
    * @var string
    */
    protected $table = 'pessoas';
    
    /**
    * A chave primária da tabela.
    * @var string
    */
    protected $primaryKey = 'pessoa_id';
    
}
