<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\reservering;
use Illuminate\Support\Facades\Event;


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
        
        $user = new User();
        $user->id = microtime() * 15 * rand(9999, 9999999); 
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
        $reservering->idticket = $request['ticket'];
        $reservering->idUser = $user->id;
        $reservering->betaalmethode = $request['betaalmethode'];
        $reservering->barcode = $reservering->idTicket . $user->id;
        $reservering->prijs = 75;
        $reservering->save();
        return redirect()->route('reservering.compleet')->with(['success' => 'U heeft succesvol Gereserveerd!']);
    }
}
