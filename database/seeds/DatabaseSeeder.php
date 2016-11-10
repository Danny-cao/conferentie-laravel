<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
       $this->call(ZaalTableSeeder::class);    
       
       $this->call(WensenTableSeeder::class);    
       
       $this->call(RoleTableSeeder::class);   
       
       $this->call(UserTableSeeder::class);    
       
       $this->call(TicketTypeTableSeeder::class);    
       
       $this->call(MaaltijdTypeTableSeeder::class);
        
       $this->call(StatusTableSeeder::class);    
       
       $this->call(AgendaTableSeeder::class);   
       
       $this->call(ZaalTableSeeder::class);
       
       $this->call(TagTableSeeder::class);
       
       $this->call(SlotTableSeeder::class);
        
       
    }
}
