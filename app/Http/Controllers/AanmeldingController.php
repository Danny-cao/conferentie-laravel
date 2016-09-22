<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aanmelding;

use App\Http\Requests;

class AanmeldingController extends Controller
{
    public function getAanmeldingIndex()
    {
        return view('layouts.aanmelden.aanmelding');
    }
    
    public function postAanmelding(Request $request)
    {
        $aanmelding = new Aanmelding();
        $aanmelding->idUser = 1; 
        $aanmelding->idSlot = 1;
        $aanmelding->onderwerp = $request['onderwerp'];
        $aanmelding->wensen = $request['wensen'];
        $aanmelding->omschrijving = $request['omschrijving'];
        $aanmelding->save();
        return redirect()->route('Aanmelding')->with(['success' => 'Message succesfully sent!']);
    }
}
