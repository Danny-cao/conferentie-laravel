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
        $zaal->id = 1;
        $zaal->zaalnaam = "Zaal 1";
        $zaal->save();
        
        $zaal = new Zaal();
        $zaal->id = 2;
        $zaal->zaalnaam = "Zaal 2";
        $zaal->save();
        
        $zaal = new Zaal();
        $zaal->id = 3;
        $zaal->zaalnaam = "Zaal 3";
        $zaal->save();
        
        $zaal = new Zaal();
        $zaal->id = 4;
        $zaal->zaalnaam = "Zaal 4";
        $zaal->save();
        
    }
}
