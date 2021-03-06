<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('pessoa_id');
            $table->string('nome', 255)->nullable(false);
            $table->string('telefone', 25)->unique()->nullable(false);
            $table->string('cpf', 25)->unique()->nullable(false);            
            $table->string('email', 255)->unique()->nullable(false);            
            $table->string('senha', 60)->unique()->nullable(false);  
            $table->string('imagem', 255)->unique()->nullable(false);  
            $table->string('remember_token', 100)->nullable();  
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
        Schema::dropIfExists('pessoas');
    }
}
