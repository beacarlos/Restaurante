<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    /**
    * Colunas que é permitidos inserção em massa.
    * @var array
    */
    protected $fillable = [
        'mesa_id', 'codigo', 'disponibilidade', 'data_de_criacao', 'ultima_atualizacao'
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
    protected $table = 'mesas';
    
    /**
    * A chave primária da tabela.
    * @var string
    */
    protected $primaryKey = 'mesa_id';
}
