<?php

use Illuminate\Database\Seeder;
use App\Maaltijd_type;

class MaaltijdTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maaltijd_type = new Maaltijd_type();
        $maaltijd_type->maaltijd_naam = "lunch";
        $maaltijd_type->prijs = 20;
        $maaltijd_type->save();
        
        $maaltijd_type = new Maaltijd_type();
        $maaltijd_type->maaltijd_naam = "diner";
        $maaltijd_type->prijs = 30;
        $maaltijd_type->save();
        
        $maaltijd_type = new Maaltijd_type();
        $maaltijd_type->maaltijd_naam = "allebei";
        $maaltijd_type->prijs = 50;
        $maaltijd_type->save();
    }
}
