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
         $slot->zaal = 1;
         $slot->agenda = 1;
         $slot->begintijd = "15:30";
         $slot->eindtijd = "16:30";
         $slot->status = 1;
         $slot->dag = "vrijdag";
         $slot->save();
         
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:45";
        $slot->eindtijd = "17:45";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "18:45";
        $slot->eindtijd = "19:45";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "20:00";
        $slot->eindtijd = "21:00";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "21:30";
        $slot->eindtijd = "22:30";
        $slot->dag = "vrijdag";
        $slot->save();
        
        
        
        //zaal 2
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:30";
        $slot->eindtijd = "16:30";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:45";
        $slot->eindtijd = "17:45";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "18:45";
        $slot->eindtijd = "19:45";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "20:00";
        $slot->eindtijd = "21:00";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "21:30";
        $slot->eindtijd = "22:30";
        $slot->dag = "vrijdag";
        $slot->save();
        
        
        
        
        //zaal 3
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:30";
        $slot->eindtijd = "16:30";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:45";
        $slot->eindtijd = "17:45";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "18:45";
        $slot->eindtijd = "19:45";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "20:00";
        $slot->eindtijd = "21:00";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "21:30";
        $slot->eindtijd = "22:30";
        $slot->dag = "vrijdag";
        $slot->save();
        
        
        
        
        
        //zaal 4
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:30";
        $slot->eindtijd = "16:30";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:45";
        $slot->eindtijd = "17:45";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "18:45";
        $slot->eindtijd = "19:45";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "20:00";
        $slot->eindtijd = "21:00";
        $slot->dag = "vrijdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "21:30";
        $slot->eindtijd = "22:30";
        $slot->dag = "vrijdag";
        $slot->save();
        
        
        //Zaterdag //Zaal 1
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "10:15";
        $slot->eindtijd = "11:15";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "11:30";
        $slot->eindtijd = "12:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "13:00";
        $slot->eindtijd = "14:00";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "14:15";
        $slot->eindtijd = "15:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:30";
        $slot->eindtijd = "16:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:45";
        $slot->eindtijd = "17:45";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "18:45";
        $slot->eindtijd = "19:45";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "20:00";
        $slot->eindtijd = "21:00";
        $slot->dag = "zaterdag";
        $slot->save();
        
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "21:30";
        $slot->eindtijd = "22:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        
        //zaterdag zaal 2
        
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "10:15";
        $slot->eindtijd = "11:15";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "11:30";
        $slot->eindtijd = "12:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "13:00";
        $slot->eindtijd = "14:00";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "14:15";
        $slot->eindtijd = "15:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:30";
        $slot->eindtijd = "16:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:45";
        $slot->eindtijd = "17:45";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "18:45";
        $slot->eindtijd = "19:45";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "20:00";
        $slot->eindtijd = "21:00";
        $slot->dag = "zaterdag";
        $slot->save();
        
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "21:30";
        $slot->eindtijd = "22:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        //zaterdag zaal 3
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "10:15";
        $slot->eindtijd = "11:15";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "11:30";
        $slot->eindtijd = "12:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "13:00";
        $slot->eindtijd = "14:00";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "14:15";
        $slot->eindtijd = "15:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:30";
        $slot->eindtijd = "16:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:45";
        $slot->eindtijd = "17:45";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "18:45";
        $slot->eindtijd = "19:45";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "20:00";
        $slot->eindtijd = "21:00";
        $slot->dag = "zaterdag";
        $slot->save();
        
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "21:30";
        $slot->eindtijd = "22:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        // zaterdag zaal 4
        
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "10:15";
        $slot->eindtijd = "11:15";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "11:30";
        $slot->eindtijd = "12:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "13:00";
        $slot->eindtijd = "14:00";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "14:15";
        $slot->eindtijd = "15:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:30";
        $slot->eindtijd = "16:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:45";
        $slot->eindtijd = "17:45";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "18:45";
        $slot->eindtijd = "19:45";
        $slot->dag = "zaterdag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "20:00";
        $slot->eindtijd = "21:00";
        $slot->dag = "zaterdag";
        $slot->save();
        
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "21:30";
        $slot->eindtijd = "22:30";
        $slot->dag = "zaterdag";
        $slot->save();
        
        
        //zondag // zaal 1
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "12:15";
        $slot->eindtijd = "13:15";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "13:30";
        $slot->eindtijd = "14:30";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:00";
        $slot->eindtijd = "16:00";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 1;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:15";
        $slot->eindtijd = "17:15";
        $slot->dag = "zondag";
        $slot->save();
        
        //zondag //zaal 2
        
          $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "12:15";
        $slot->eindtijd = "13:15";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "13:30";
        $slot->eindtijd = "14:30";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:00";
        $slot->eindtijd = "16:00";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 2;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:15";
        $slot->eindtijd = "17:15";
        $slot->dag = "zondag";
        $slot->save();
        
        
        //zondag zaal 3
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "12:15";
        $slot->eindtijd = "13:15";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "13:30";
        $slot->eindtijd = "14:30";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:00";
        $slot->eindtijd = "16:00";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 3;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:15";
        $slot->eindtijd = "17:15";
        $slot->dag = "zondag";
        $slot->save();
        
        //zondag zaal 4
        
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "12:15";
        $slot->eindtijd = "13:15";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "13:30";
        $slot->eindtijd = "14:30";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "15:00";
        $slot->eindtijd = "16:00";
        $slot->dag = "zondag";
        $slot->save();
        
        $slot = new Slot();
        $slot->zaal = 4;
        $slot->agenda = 1;
        $slot->status = 1;
        $slot->begintijd = "16:15";
        $slot->eindtijd = "17:15";
        $slot->dag = "zondag";
        $slot->save();
    }
}
