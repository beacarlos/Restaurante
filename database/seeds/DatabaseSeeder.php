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
        $this->call(Mesas::class);
        $this->call(Pessoa_Tipo_Seed::class);
    }
}
