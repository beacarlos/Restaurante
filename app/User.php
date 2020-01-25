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
        'name', 'telefone', 'email', 'cpf', 'password', 'pessoa_tipo_fk', 'create_at', 'update_at'
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password'
    ];
    
    /**
    * Coluna created_at timestamp modificada.
    * @var string
    */
    const CREATED_AT = 'created_at';
    
    /**
    * Coluna last_update timestamp modificada.
    * @var string
    */
    const UPDATED_AT = 'updated_at';
    
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
}
