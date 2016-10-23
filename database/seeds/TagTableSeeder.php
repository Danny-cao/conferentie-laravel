<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->tag_naam = 'Javascript';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'PHP';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Angular';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Jquery';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Git';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Linux';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'SQL';
        $tag->save();
    }
}
