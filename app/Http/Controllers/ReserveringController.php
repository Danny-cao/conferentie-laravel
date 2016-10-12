<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\reservering;
use App\ticket;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use App\Events\MessageTicket;
use PDF;
use QrCode;

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
    
    public function getPDF() 
    {
        $pdf = PDF::loadView('pdf.customer');
        return $pdf->download('customer.pdf');
        
    }
    
    public function postReserveringTest(Request $request)
    {
       
        $this->validate($request, [
                'naam' => 'required',
                'email' => 'required|email',
                'ticket' => 'required'
                
            ]);
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
            
            $ticketTests = []; 
            for($i=0;$i < count($post['ticket']); $i++)
            {
                
                 $ticketTests[] = reservering::create([
                             'idUser' => $j,
                             'idTicket' => $post['ticket'][$i],
                             'idMaaltijd' => $post['maaltijd'][$i],
                             'betaalmethode' => $post['betaalmethode'],
                             'barcode' => $i .$j . $post['ticket'][$i].time(),
                             'prijs' => $post['amount'][$i],]
                    );
                
            }
            
            $pdf = PDF::loadView('pdf.customer',[
                'ticketTests' => $ticketTests,
                'user' => $usertest,
                ]);
            
            foreach ($ticketTests as $test){
                
                QrCode::format('png')->size(130)->generate('test',public_path(). '/src/'.$test->id.'.jpg');
                
            }
            
            Event::fire(new MessageTicket($ticketTests,$usertest,$pdf));
            
            
            return redirect()->route('reservering.compleet')->with(['success' => 'U heeft succesvol Gereserveerd!']);
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
        $slots = DB::table('slots')->get();
        
        return view('layouts.agenda.agenda', ['slots' =>$slots]);
    }
}
