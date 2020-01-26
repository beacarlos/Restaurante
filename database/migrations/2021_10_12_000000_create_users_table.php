<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255)->nullable(false);
            $table->string('telefone', 50)->unique()->nullable(false);
            $table->string('cpf', 25)->unique()->nullable(false);            
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('imagem', 255)->default('user.png')->unique()->nullable(false);  
            $table->integer('pessoa_tipo_fk')->unsigned();
            $table->foreign('pessoa_tipo_fk')->references('pessoa_tipo_id')->on('pessoa_tipo');  
            $table->timestamp('data_de_criacao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ultima_atualizacao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes('data_de_exclusao');      
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
