<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComandasTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('comandas', function (Blueprint $table) {
            $table->increments('comanda_id');
            $table->boolean('status')->default(1);
            $table->integer('pedido_fk')->unsigned();
            $table->foreign('pedido_fk')->references('pedido_id')->on('pedidos'); 
            $table->integer('mesa_fk')->unsigned();
            $table->foreign('mesa_fk')->references('mesa_id')->on('mesas');
            $table->integer('pessoa_fk')->unsigned();
            $table->foreign('pessoa_fk')->references('pessoa_id')->on('pessoas');  
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
        Schema::dropIfExists('comandas');
    }
}
