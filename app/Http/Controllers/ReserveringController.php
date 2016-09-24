<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Reservering;

class ReserveringController extends Controller
{
    public function getReserveringIndex()
    {
        return view('layouts.reserveren.reservering');    
    }
    
    
    public function postReservering(Request $request)
    {
        $reservering = new Reservering();
        $reservering->iduser = 1;
        $reservering->idticket = 1;
        $reservering->betaalmethode = $request['betaalmethode'];
        $reservering->barcode = 3213213;
        $reservering->prijs = 75;
        $reservering->save();
        return redirect()->route('reservering')->with(['success' => 'U heeft succesvol Gereserveerd!']);
    }
}
