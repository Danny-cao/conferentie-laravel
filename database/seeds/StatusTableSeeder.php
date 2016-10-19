<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->status = "vrij";
        $status->save();
        
        $status = new Status();
        $status->status = "onder voorbehoud";
        $status->save();
        
        $status = new Status();
        $status->status = "bezet";
        $status->save();
    }
}
