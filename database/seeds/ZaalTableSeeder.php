<?php

use Illuminate\Database\Seeder;
use App\Zaal;

class ZaalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zaal = new Zaal();
        $zaal->zaalnaam = "zaal 1";
        $zaal->save();
        
        $zaal = new Zaal();
        $zaal->zaalnaam = "zaal 2";
        $zaal->save();
        
        $zaal = new Zaal();
        $zaal->zaalnaam = "zaal 3";
        $zaal->save();
        
        $zaal = new Zaal();
        $zaal->zaalnaam = "zaal 4";
        $zaal->save();
    }
}
