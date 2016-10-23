<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Aanmelding;
use App\Slot;
use Illuminate\Support\Facades\Mail;

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
        $slots = DB::table('slots')->get();
        $users = DB::table('users')->get();
        return view('organisator.aanvraag')->with(['aanmeldingen' => $aanmeldingen, 'slots'=> $slots, 'users' => $users]);
        
    }
    
    public function postAanvraag(Request $request)
    {
            DB::table('slots')
            ->where('id', $request['slotAanvraag'])
            ->update(['status' => 3]);
            
            
            
            $email = $request['email'];
            $gebruiker = $request['naam'];
            $gekozen_slot = $request['slotAanvraag'];
            $slots = DB::table('slots')->get();
            $aanmeldingen = DB::table('aanmeldings')->get();
               
         Mail::send('emails.send_result_aanvraag_mail', ['gekozen_slot' => $gekozen_slot, 'slots' => $slots , 'aanmeldingen' => $aanmeldingen,'email' => $email, 'gebruiker' => $gebruiker ], function($m) use ($email, $gebruiker){
           $m->from('info@ict-open.nl',' Conferentie ICT-OPEN');
           $m->to($email,$gebruiker);
           $m->subject('Beoordeling Aanvraag Aanmelding');
           
         });
        
        return redirect()->route('user.aanvraag')->with(['success' => 'aanvraag geaccepteerd']);
    }
    
    public function getConferentie()
    {
        $conferenties = DB::table('slots')->get();
        return view('organisator.conferentie')->with(['conferenties' => $conferenties]);
    }
    
    public function getSprekers()
    {
        $sprekers = DB::table('users')->get();
        $aanmeldingen = DB::table('aanmeldings')->get();
        $slots = DB::table('slots')->get();
        return view('organisator.sprekers')->with(['sprekers' => $sprekers , 'aanmeldingen' => $aanmeldingen, 'slots' => $slots]);
    }
    
    
    
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'gebruikersnaam' => 'required',
            'password' => 'required'
            ]);
            
        if (!Auth::attempt(['gebruikersnaam' => $request['gebruikersnaam'], 'password' => $request['password'] , 'role' => 3 ])) {
            return redirect()->back()->with(['fail' => 'U heeft een verkeerde gebruikersnaam of wachtwoord ingevoerd']);
        }    
        return redirect()->route('user.dashboard');
    }
}
