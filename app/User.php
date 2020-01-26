<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    
    /**
    * A tabela mysql associada ao model.
    * @var string
    */
    protected $table = 'users';
    
    /**
    * A chave primária da tabela.
    * @var string
    */
    protected $primaryKey = 'id';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nome', 'telefone', 'email', 'cpf', 'senha', 'pessoa_tipo_fk', 'data_de_criacao', 'ultima_atualizacao', 'data_de_exclusao'
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'senha', 'remember_token'
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
    * Coluna delete_at timestamp modificada.
    * @var string
    */
    const DELETED_AT = 'data_de_exclusao';
}
