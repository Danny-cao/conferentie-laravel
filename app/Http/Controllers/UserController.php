<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
     public function getLogin()
    {
        return view('organisator.login');
    }
    
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
    
    
    public function getDashboard() 
    {

        return view('organisator.dashboard');
    }
    
    public function getAanvraag()
    {
        $aanmeldingen = DB::table('aanmeldings')->get();
        return view('organisator.aanvraag')->with(['aanmeldingen' => $aanmeldingen]);
    }
    
    public function getConferentie()
    {
        $conferenties = DB::table('slots')->get();
        return view('organisator.conferentie')->with(['conferenties' => $conferenties]);
    }
    
    public function getSprekers()
    {
        $sprekers = DB::table('users')->get();
        return view('organisator.sprekers')->with(['users' => $users]);
    }
    
    
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'gebruikersnaam' => 'required',
            'password' => 'required'
            ]);
            
        if (!Auth::attempt(['gebruikersnaam' => $request['gebruikersnaam'], 'password' => $request['password']])) {
            return redirect()->back()->with(['fail' => 'U heeft een verkeerde gebruikersnaam of wachtwoord ingevoerd']);
        }    
        return redirect()->route('user.dashboard');
    }
}
