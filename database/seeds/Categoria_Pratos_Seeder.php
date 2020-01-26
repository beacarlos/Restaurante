<?php

use Illuminate\Database\Seeder;
use App\CategoriaPrato;
use App\PessoaTipo;
use App\Mesa;

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
        
        $pessoa_tipo = PessoaTipo::query()->truncate();
        DB::table('pessoa_tipo')->insert([ ['descricao'=> 'Garçom'], ['descricao'=> 'Gerência'], ['descricao'=> 'Cozinha']]);
        
        $mesas = Mesa::query()->truncate();
        for ($i=1; $i < 21; $i++) { 
            DB::table('mesas')->insert(['nome'=> 'Mesa '.$i]);
        }
        
        $pessoa_tipo = CategoriaPrato::query()->truncate();
        DB::table('categoria_pratos')->insert([
            ['descricao'=> 'Guarnições'],
            ['descricao'=> 'Bebidas'],
            ['descricao'=> 'Carnes'],
            ['descricao'=> 'Massas'],
            ['descricao'=> 'Sobremessas']
            ]);
            
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
    