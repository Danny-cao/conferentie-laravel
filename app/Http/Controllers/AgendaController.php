<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class AgendaController extends Controller
{
      
    public function getAgenda()
    {
        $slots = DB::table('slots')->get();
        $statuses = DB::table('statuses')->get();
        $aanmeldingen = DB::table('aanmeldings')->get();
        $users = DB::table('users')->get();
        
        return view('layouts.agenda.agenda', ['slots' =>$slots, 'aanmeldingen'=> $aanmeldingen, 'users'=> $users, 'statuses' => $statuses]);
    }
}
