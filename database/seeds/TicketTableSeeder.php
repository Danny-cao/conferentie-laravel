<?php

use Illuminate\Database\Seeder;
use App\ticket;
class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticket = new Ticket();
        $ticket->idMaaltijd = 1;
        $ticket->soort = "vrijdag";
        $ticket->prijs = 45;
        $ticket->beschikbaar = 250;
        $ticket->save();
    }
}
