<?php

use Illuminate\Database\Seeder;
use App\PessoaTipo;

class Pessoa_Tipo_Seed extends Seeder
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        DB::table('pessoa_tipo')->insert([
            ['descricao'=> 'Garçom'],
            ['descricao'=> 'Gerência'],
            ['descricao'=> 'Cozinha'],
            ]);
        }
    }
    