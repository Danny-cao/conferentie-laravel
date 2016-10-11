<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aanmelding;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Slot;

use App\Http\Requests;

class AanmeldingController extends Controller
{
    public function getAanmeldingIndex()
    {
        
        $querySlots = DB::table('slots')->get(); 
        
        return view('layouts.aanmelden.aanmelding')->with(['Slots'=>$querySlots]);    
        
    }
    
       public function getAanmeldingCompleet()
    {
        return view('layouts.aanmelden.aanmelding_compleet');
    }
    
    public function postAanmelding(Request $request)
    {
        $user = new User();
        $user->id = DB::table('users')->max('id') + 1;
        $user->naam = $request['naam'];
        $user->tussenvoegsel = $request['tussenvoegsel'];
        $user->achternaam = $request['achternaam'];
        $user->email = $request['email'];
        $user->telnummer = $request['telnummer'];
        $user->adres = $request['adres'];
        $user->woonplaats = $request['woonplaats'];
        $user->role = "Spreker";
        $user->save();
        
        
        $aanmelding = new Aanmelding();
        $aanmelding->idUser = $user->id; 
        $aanmelding->idSlot = $request['slot'];
        $aanmelding->onderwerp = $request['onderwerp'];
        $aanmelding->wensen = $request['wensen'];
        $aanmelding->omschrijving = $request['omschrijving'];
        $aanmelding->voorkeur = $request['voorkeur'];
        $aanmelding->save();
        
        DB::table('slots')
            ->where('id', $request['slot'])
            ->update(['status' => 'onder voorbehoud']);
        
        return redirect()->route('aanmelding.compleet')->with(['success' => 'Aanmelding voltooid , U krijgt binnenkort een emailtje of u de conferentie mag geven']);
    }
}
