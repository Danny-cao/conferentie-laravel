<?php

use Illuminate\Database\Seeder;
use App\Agenda;

class AgendaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agenda = new Agenda();
        $agenda->agenda_naam = "Conferentie";
        $agenda->save();
    }
}
