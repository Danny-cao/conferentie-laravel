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
        
        
        $tags = DB::table('tags')->get();
        $slot_tags = DB::table('slot_tags')->get();
        $aanmeldingen = DB::table('aanmeldings')->get();
        
        $slots = DB::table('slots')->get();
        $users = DB::table('users')->get();
        
        
        $searchTag = $request['search'];
         
        return view('layouts.search')->with(['searchTag' => $searchTag, 'tags' => $tags, 'slot_tags' => $slot_tags , 'aanmeldingen' => $aanmeldingen, 'slots' => $slots, 'users' => $users]); 
    }
}
