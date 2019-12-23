<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
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
    protected $table = 'pessoas';
    
    /**
    * A chave primária da tabela.
    * @var string
    */
    protected $primaryKey = 'pessoa_id';
    
}
