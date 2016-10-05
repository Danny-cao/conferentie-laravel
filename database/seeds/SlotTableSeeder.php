<?php

use Illuminate\Database\Seeder;
use App\Slot;
class SlotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slot = new Slot();
        $slot->idZaal = "1";
        $slot->idTag = "1";
        $slot->begintijd = "15:30";
        $slot->eindtijd = "16:30";
        $slot->status = "vrij";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->idZaal = "1";
        $slot->idTag = "1";
        $slot->begintijd = "16:45";
        $slot->eindtijd = "17:45";
        $slot->status = "vrij";
        $slot->dag = "vrijdag";
        $slot->save();
    }
    
 
        
}
