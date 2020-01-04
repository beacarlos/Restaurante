<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prato extends Model
{
    /**
    * Colunas que é permitidos inserção em massa.
    * @var array
    */
    protected $fillable = [
        'prato_id', 'nome', 'descricao', 'preco', 'ativo', 'categoria_prato_fk', 'data_de_criacao', 'ultima_atualizacao'
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
    const UPDATED_AT = 'ultima_atualizacao';
    
    /**
    * A tabela mysql associada ao model.
    * @var string
    */
    protected $table = 'pratos';
    
    /**
    * A chave primária da tabela.
    * @var string
    */
    protected $primaryKey = 'prato_id';
}
