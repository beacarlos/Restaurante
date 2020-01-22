<?php

use Illuminate\Database\Seeder;
use App\CategoriaPrato;

class Categoria_Pratos_Seeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $pessoa_tipo = CategoriaPrato::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        DB::table('categoria_pratos')->insert([
            ['descricao'=> 'Guarnições'],
            ['descricao'=> 'Bebidas'],
            ['descricao'=> 'Carnes'],
            ['descricao'=> 'Massas'],
            ['descricao'=> 'Sobremessas']
            ]);
        }
    }
    