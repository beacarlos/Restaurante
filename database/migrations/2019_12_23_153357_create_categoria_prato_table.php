<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaPratoTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('categoria_pratos', function (Blueprint $table) {
            $table->increments('categoria_prato_id');
            $table->string('descricao', 255)->nullable(false);
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
        Schema::dropIfExists('categoria_pratos');
    }
}
