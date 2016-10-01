<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\reservering;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;

class ReserveringController extends Controller
{
    public function getReserveringIndex()
    {
        return view('layouts.reserveren.reservering');    
    }
    
    public function getReserveringCompleet()
    {
        return view('layouts.reserveren.reservering_compleet');
    }
    
    
    public function postReservering(Request $request)
    { 
        
        $this->validate($request, [
            
            'ticket'                => 'required|',
            'naam'                  => 'required|max:30',
            'achternaam'            => 'required|max:30',
            'email'                 => 'required|email'
        ]
    );
        
        $user = new User();
        $user->id = DB::table('users')->max('id') + 1;
        $user->naam = $request['naam'];
        $user->tussenvoegsel = $request['tussenvoegsel'];
        $user->achternaam = $request['achternaam'];
        $user->email = $request['email'];
        $user->telnummer = $request['telnummer'];
        $user->adres = $request['adres'];
        $user->woonplaats = $request['woonplaats'];
        $user->role = "bezoeker";
        $user->save();
        
        $reservering = new Reservering();
        $reservering->id = DB::table('reserverings')->max('id') + 1;
        $reservering->idticket = $request['ticket'];
        $reservering->idUser = $user->id;
        $reservering->betaalmethode = $request['betaalmethode'];
        $reservering->barcode = $reservering->id . $reservering->idticket . $user->id;
        $reservering->prijs = DB::table('tickets')->where('id', $reservering->idticket )->value('prijs');
        $reservering->save();
        return redirect()->route('reservering.compleet')->with(['success' => 'U heeft succesvol Gereserveerd!']);
    }
    
    public function testDBQuery()
    {
        $users = DB::table('users')->get();
        
        return view('layouts.agenda.agenda', ['users' =>$users]);
    }
}
