<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use App\Slot_tag;
use App\Slot;
use App\Aanmeldingen;
use App\User;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function getSearch(Request $request){
        
        
        $allTags = DB::table('tags')->get();
        
        
        
        $searchTag = $request->get('search');
       
        $slots_search = DB::table('tags')->where('tag_naam' ,'=',  $searchTag)
        ->join('slot_tags', 'slot_tags.tag','=', 'tags.id')
        ->join('slots','slots.id', '=','slot_tags.slot')
        ->join('aanmeldings','aanmeldings.slot','=','slots.id')
        ->join('users', 'users.id', '=' ,'aanmeldings.user')
        ->whereNotNull('user')->get([
            'naam',
            'tussenvoegsel',
            'achternaam',
            'onderwerp',
            'omschrijving',
            'zaal',
            'begintijd',
            'eindtijd',
            'zaal',
            'dag',
            ]);

        
       // $slots = DB::table('slots')->where('id' , '= ', 'slot_tags');

        
        return view('layouts.search')->with(['slots_search' => $slots_search, 'searchTag'=>$searchTag, 'allTags' => $allTags]); 
       // return view('layouts.search')->with(['searchTag' => $searchTag, 'tags' => $tags, 'slot_tags' => $slot_tags , 'aanmeldingen' => $aanmeldingen, 'slots' => $slots, 'users' => $users]); 
    }
}
