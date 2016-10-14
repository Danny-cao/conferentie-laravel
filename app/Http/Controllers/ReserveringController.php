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
use Illuminate\Support\Facades\Mail;

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
                
                QrCode::format('png')->size(250)->generate('ticketcode: ' .$test->barcode,public_path(). '/src/tickets/'.$test->id.'.jpg');
                QrCode::format('png')->size(250)->generate('maaltijdcode: ' .$test->idMaaltijd,public_path(). '/src/tickets/'.$test->idMaaltijd.'.jpg');
            }
            
            Event::fire(new MessageTicket($ticketTests,$usertest,$pdf));
            
            
      /*  $pathToFile = $pdf;
        $user = $usertest;
        $reservering_ticket = $ticketTests;
        
               return $pathToFile->stream();
               
         Mail::send('emails.send_ticket_mail', ['reservering_ticket' => $reservering_ticket, 'user' => $user ,'pathToFile' => $pathToFile], function($m) use ($reservering_ticket, $pathToFile, $user){
           $m->from('info@ict-open.nl',' Conferentie ICT-OPEN');
           $m->to($user['email'],$user['naam']);
           $m->subject('ticket Reservering');
           $m->attachData($pathToFile->output(),'ticket.pdf');
           
         });*/
            
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
