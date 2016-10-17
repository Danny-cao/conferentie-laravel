<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->role = "organisator";
        $role->save();
        
        $role = new Role();
        $role->role = "bezoeker";
        $role->save();
        
        $role = new Role();
        $role->role = "spreker";
        $role->save();
    }
}
