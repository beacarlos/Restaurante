<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaTipo extends Model
{
    /**
    * Colunas que é permitidos inserção em massa.
    * @var array
    */
    protected $fillable = [
        'pessoa_tipo_id', 'descricao', 'data_de_criacao', 'ultima_atualizacao'
    ];

    /**
    * Coluna created_at timestamp modificada.
    * @var string
    */
    const CREATED_AT = 'data_de_criacao';
    
    /**
    * Coluna last_update timestamp modificada.
    * @var string
    */
    const UPDATED_AT = 'ultima_atualizcao';
    
    /**
    * A tabela mysql associada ao model.
    * @var string
    */
    protected $table = 'pessoa_tipo';
    
    /**
    * A chave primária da tabela.
    * @var string
    */
    protected $primaryKey = 'pessoa_tipo_id';
    
}
