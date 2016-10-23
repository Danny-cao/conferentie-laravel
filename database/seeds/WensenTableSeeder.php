<?php

use Illuminate\Database\Seeder;
use App\Wensen;

class WensenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wens = new Wensen();
        $wens->wens = "beamer";
        $wens->save();
        
        $wens = new Wensen();
        $wens->wens = "Computer";
        $wens->save();
        
        $wens = new Wensen();
        $wens->wens = "Stoel";
        $wens->save();
        
        $wens = new Wensen();
        $wens->wens = "Tafel";
        $wens->save();
        
        $wens = new Wensen();
        $wens->wens = "Scherm";
        $wens->save();
        
    }
}
