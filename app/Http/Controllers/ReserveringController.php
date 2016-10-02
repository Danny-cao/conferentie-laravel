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
    
     public function getReserveringTest()
    {
        
        $query = DB::table('tickets')->get();
        $queryMaaltijd = DB::table('maaltijds')->get();

        return view('layouts.reserveren.reservering_test')->with(['tickets'=>$query, 'maaltijds'=>$queryMaaltijd]);    
        
    }
    
    public function postReserveringTest(Request $request)
    {
        $post = $request->all();
        
        $usertest = array(
            
                        'id' => DB::table('users')->max('id') + 1,
                        'naam' => $post['naam'],
                        'tussenvoegsel' => $post['tussenvoegsel'],
                        'achternaam' => $post['achternaam'],
                        'email' => $post['email'],
                        'telnummer' => $post['telnummer'],
                        'adres' => $post['adres'],
                        'woonplaats' => $post['woonplaats'],
                        'role' => "bezoeker",
                             
                      );
        
        $j = DB::table('users')->insertgetId($usertest);
        if($j >0)
        {
            for($i=0;$i < count($post['ticket']); $i++)
            {
                $ticketTest = array(
                             'id' => DB::table('reserverings')->max('id') + 1,
                             'idUser' => $j,
                             'idTicket' => $post['ticket'][$i],
                             'betaalmethode' => $post['betaalmethode'],
                             'barcode' => $j . $post['ticket'][$i].time(),
                             'prijs' => $post['price'][$i]
                    );
                    DB::table('reserverings')->insert($ticketTest);
            }
            return redirect()->route('reservering.compleet')->with(['success' => 'U heeft succesvol Gereserveerd!']);
        }
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
