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
        $tag->tag_naam = 'C';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'C++';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'GO';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Java';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Python';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'BigTable';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'MariaDB';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Hack';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Erlang';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Xhp';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Haskell';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Perl';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Mysql';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'PostgreSQL';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'HBase';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Cassandra';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Scala';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Ruby';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'ASP.NET';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'Django';
        $tag->save();
        
        $tag = new Tag();
        $tag->tag_naam = 'MariaDB';
        $tag->save();
        
        
        
        
        
        
        
        
    }
}
