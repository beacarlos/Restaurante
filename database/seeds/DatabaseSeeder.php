<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Mesas_Seeder::class);
        $this->call(Pessoa_Tipo_Seeder::class);
        $this->call(Categoria_Pratos_Seeder::class);
    }
}
