<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePratosTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('pratos', function (Blueprint $table) {
            $table->increments('prato_id');
            $table->string('nome', 45)->nulllable();
            $table->string('descricao', 200)->nullable();
            $table->double('preco', 8, 2)->nullable();
            $table->boolean('ativo')->default(1);
            $table->integer('categoria_prato_fk')->unsigned();
            $table->foreign('categoria_prato_fk')->references('categoria_prato_id')->on('categoria_pratos');   
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
        Schema::dropIfExists('pratos');
    }
}
