<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nome', 'telefone', 'email', 'cpf', 'senha', 'pessoa_tipo_fk', 'data_de_criacao', 'ultima_atualizacao'
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'senha'
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
    protected $table = 'pessoas';
    
    /**
    * A chave primária da tabela.
    * @var string
    */
    protected $primaryKey = 'pessoa_id';
}
