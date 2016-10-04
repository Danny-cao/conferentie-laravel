<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
        return view('organisator.aanvraag');
    }
    
    public function getConferentie()
    {
        return view('organisator.conferentie');
    }
    
    public function getSprekers()
    {
        return view('organisator.sprekers');
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
