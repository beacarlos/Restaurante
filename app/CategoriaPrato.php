<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPrato extends Model
{
    /**
    * Colunas que é permitidos inserção em massa.
    * @var array
    */
    protected $fillable = ['descricao'];
    
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
    protected $table = 'categoria_pratos';
    
    /**
    * A chave primária da tabela.
    * @var string
    */
    protected $primaryKey = 'categoria_prato_id';
    
}
