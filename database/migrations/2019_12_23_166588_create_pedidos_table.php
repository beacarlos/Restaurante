<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('pedido_id');
            $table->bigInteger('quantidade');
            $table->boolean('status')->default(1);
            $table->integer('comanda_fk')->unsigned();
            $table->foreign('comanda_fk')->references('comanda_id')->on('comandas'); 
            $table->integer('prato_fk')->unsigned();
            $table->foreign('prato_fk')->references('prato_id')->on('pratos'); 
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
        Schema::dropIfExists('pedidos');
    }
}
