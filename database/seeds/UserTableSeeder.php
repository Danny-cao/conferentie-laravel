<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->naam = "danny";
        $user->tussenvoegsel = "de";
        $user->achternaam = "cao";
        $user->email = "danny.dc.cao@gmail.com";
        $user->telnummer = "0685362627";
        $user->adres = "Riojagaard 6";
        $user->woonplaats = "Woerden";
        $user->gebruikersnaam = "organisator";
        $user->password = bcrypt("organisator_test");
        $user->role = 1;
        $user->save();

    }
}
