<?php

use Illuminate\Database\Seeder;
use App\maaltijd;
class MaaltijdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maaltijd = new Maaltijd();
        $maaltijd->soortmaaltijd = "lunch";
        $maaltijd->prijs = 20;
        $maaltijd->beschikbaar = "all";
        $maaltijd->save();
        
        $maaltijd = new Maaltijd();
        $maaltijd->soortmaaltijd = "diner";
        $maaltijd->prijs = 30;
        $maaltijd->beschikbaar = "weekend";
        $maaltijd->save();
        
        $maaltijd = new Maaltijd();
        $maaltijd->soortmaaltijd = "allebei";
        $maaltijd->prijs = 50;
        $maaltijd->beschikbaar = "weekend";
        $maaltijd->save();
        
        $maaltijd = new Maaltijd();
        $maaltijd->soortmaaltijd = "null";
        $maaltijd->prijs = 0;
        $maaltijd->beschikbaar = "all";
        $maaltijd->save();
    }
}
