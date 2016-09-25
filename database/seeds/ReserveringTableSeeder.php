<?php

use Illuminate\Database\Seeder;
use App\reservering;
class ReserveringTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservering = new Reservering();
        $reservering->idUser = 1;
        $reservering->idTicket = 1;
        $reservering->betaalmethode = "IDEAL";
        $reservering->barcode = "111234";
        $reservering->prijs = 65;
        $reservering->save();
    }
}
