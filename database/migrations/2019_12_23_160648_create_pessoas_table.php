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
            $table->string('nome', 255)->nullable();
            $table->string('telefone', 15)->unique()->nullable();
            $table->string('cpf', 25)->unique()->nullable();            
            $table->string('email', 255)->unique()->nullable();            
            $table->string('senha', 8)->unique()->nullable();  
            $table->integer('pessoa_tipo_fk')->unsigned();
            $table->foreign('pessoa_tipo_fk')->references('pessoa_tipo_id')->on('pessoa_tipo');        
            $table->timestamp('data_de_criacao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ultima_atualizacao')->default(DB::raw('CURRENT_TIMESTAMP'));
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
