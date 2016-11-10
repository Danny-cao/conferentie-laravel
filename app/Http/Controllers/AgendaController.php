<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class AgendaController extends Controller
{
      
    public function getAgenda()
    {
        
        $agenda_vrijdag = DB::table('slots')->where('dag' ,'=',  'vrijdag')
        ->join('zaals', 'zaals.id','=', 'slots.zaal')
        ->join('statuses','statuses.id', '=','slots.status')
        ->leftJoin('aanmeldings','aanmeldings.slot','=','slots.id')->orderBy('slots.id')->get([
            'begintijd',
            'eindtijd',
            'statuses.status',
            'statuses.id',
            'zaal',
            'zaalnaam',
            'onderwerp',
            'dag',
            ]);
            
            
        $agenda_zaterdag = DB::table('slots')->where('dag' ,'=',  'zaterdag')
        ->join('zaals', 'zaals.id','=', 'slots.zaal')
        ->join('statuses','statuses.id', '=','slots.status')->orderBy('slots.id')
        ->leftJoin('aanmeldings','aanmeldings.slot','=','slots.id')->get([
            'begintijd',
            'eindtijd',
            'statuses.status',
            'statuses.id',
            'zaal',
            'zaalnaam',
            'onderwerp',
            'dag',
            ]);    
            
            
        $agenda_zondag = DB::table('slots')->where('dag' ,'=',  'zondag')
        ->join('zaals', 'zaals.id','=', 'slots.zaal')
        ->join('statuses','statuses.id', '=','slots.status')->orderBy('slots.id')
        ->leftJoin('aanmeldings','aanmeldings.slot','=','slots.id')->get([
            'begintijd',
            'eindtijd',
            'statuses.status',
            'statuses.id',
            'zaal',
            'zaalnaam',
            'onderwerp',
            'dag',
            ]);
                    
            //var_dump($agenda_vrijdag);
        

        

        return view('layouts.agenda.agenda')->with(['vrijdags' => $agenda_vrijdag, 'zaterdags' => $agenda_zaterdag, 'zondags' => $agenda_zondag]); 
    }
}
