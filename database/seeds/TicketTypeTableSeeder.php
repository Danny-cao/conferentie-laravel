<?php

use Illuminate\Database\Seeder;
use App\Ticket_type;

class TicketTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticket_type = new Ticket_type();
        $ticket_type->ticket_naam = "vrijdag";
        $ticket_type->prijs = 45;
        $ticket_type->aantal_beschikbaar = 250;
        $ticket_type->save();
        
        $ticket_type = new Ticket_type();
        $ticket_type->ticket_naam = "zaterdag";
        $ticket_type->prijs = 60;
        $ticket_type->aantal_beschikbaar = 250;
        $ticket_type->save();
        
        $ticket_type = new Ticket_type();
        $ticket_type->ticket_naam = "zondag";
        $ticket_type->prijs = 30;
        $ticket_type->aantal_beschikbaar = 250;
        $ticket_type->save();
        
        $ticket_type = new Ticket_type();
        $ticket_type->ticket_naam = "weekend";
        $ticket_type->prijs = 80;
        $ticket_type->aantal_beschikbaar = 250;
        $ticket_type->save();
        
        $ticket_type = new Ticket_type();
        $ticket_type->ticket_naam = "passe-partout";
        $ticket_type->prijs = 100;
        $ticket_type->aantal_beschikbaar = 250;
        $ticket_type->save();

    }
}
