<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\CategoriaPrato;
use App\PessoaTipo;
use App\Mesa;
use App\User;

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
            
            $pessoa = new User;
            $pessoa->query()->truncate();
            $pessoa->nome = 'Admin';
            $pessoa->telefone = "(99) 9 9999-9999";
            $pessoa->cpf = "000.000.000-81";
            $pessoa->email = "admin@gmail.com";
            $pessoa->password = Hash::make(12345678);
            $pessoa->pessoa_tipo_fk = 2;
            $pessoa->save();
            
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
    