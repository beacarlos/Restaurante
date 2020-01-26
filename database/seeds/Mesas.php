<?php

use Illuminate\Database\Seeder;
use App\Mesa;

class Mesas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $mesas = Mesa::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        for ($i=1; $i < 21; $i++) { 
            DB::table('mesas')->insert(['nome'=> 'Mesa '.$i]);
        }
    }
}