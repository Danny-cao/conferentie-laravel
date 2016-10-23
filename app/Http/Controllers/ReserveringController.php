<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Reservering;
use App\Ticket;
use App\Maaltijd;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use App\Events\MessageTicket;
use PDF;
use QrCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ReserveringController extends Controller
{
    public function getReserveringIndex()
    {
        $query = DB::table('ticket_types')->get();
        $queryMaaltijd = DB::table('maaltijd_types')->get();

        return view('layouts.reserveren.reservering')->with(['tickets'=>$query, 'maaltijds'=>$queryMaaltijd]);     
    }
    
    public function getReserveringCompleet()
    {
        return view('layouts.reserveren.reservering_compleet');
    }
    
    
    public function getTest() 
    {
        $query1 = DB::table('ticket_types')->get();
        $queryMaaltijd1 = DB::table('maaltijd_types')->get();
        
        return view('test.test')->with(['ticket_types'=>$query1, 'maaltijd_types'=>$queryMaaltijd1]);
        
    }
    
    public function postTest(Request $request)
    {
        $data = $request->all();

		$validator = \Validator::make($data, [
			'naam' => 'required',
			'email' => 'required|email',
			'payment' => 'required',
		]);

		if ($validator->fails()) {
			$this->throwValidationException($request, $validator);
		}

		$ticket_types = \DB::table('ticket_types')->get();

		$user = null;
		$reservation = null;
		// alleen verder kijken als er minimaal 1 ticket gekocht wordt
		// dan pas is reservatie niet null

		$tickets = [];
		$max_ticket_id = Ticket::max('id');
		$last_ticket_id = $max_ticket_id;

		//todo: kijken naar ticket priorities, dus als er al 250? records zijn

		$now = Carbon::now(config('app.timezone'))->toDateTimeString();

		foreach ($ticket_types as $ticket_type) {

			$ticket_type_count = $request->get('ticket-' . $ticket_type->id);

			if (intval($ticket_type_count) > 0) {

				if ($reservation == null) {

					// insert bezoeker / reservatie
					// wordt maar 1 keer aangeroepen
					$user = User::create([
					    'role' => 1,
						'email' => $request->get('email'),
						'naam' => $request->get('naam'),
					]);
					
					

					$reservation = Reservering::create([
						'user' => $user->id,
						'betaalmethode' => $request->get('payment'),
					]);
				}

				for ($i = 0; $i < $ticket_type_count; $i++) {

					$last_ticket_id++;

					$tickets[] = [
						'id' => $last_ticket_id,
						'reservering' => $reservation->id,
						'ticket_type' => $ticket_type->id,
						'ticketcode' => uniqid($reservation->id . $ticket_type->id . $last_ticket_id),
						'created_at' => $now,
						'updated_at' => $now,
					];
					
				}

			}
		}

		$meals = [];
		$max_meal_id = Maaltijd::max('id');
		$last_meal_id = $max_meal_id;

		if ($reservation != null) {

			$meal_types = \DB::table('maaltijd_types')->get();

			foreach ($meal_types as $meal_type) {

				$meal_type_count = $request->get('maaltijd-' . $meal_type->id);

				if (intval($meal_type_count) > 0) {

					for ($i = 0; $i < $meal_type_count; $i++) {

						$last_meal_id++;

						$meals[] = [
							'id' => $last_meal_id,
							'reservering' => $reservation->id,
							'maaltijd_type' => $meal_type->id,
							'maaltijdcode' => uniqid($reservation->id . $meal_type->id . $last_meal_id),
							'created_at' => $now,
							'updated_at' => $now,
						];

					}

				}
			}

		/*	// mag maximaal 10 tickets bestellen
			if ($last_ticket_id - $max_ticket_id > env('MAX_TICKETS')) {
				return redirect()
					->back()->withInput()
					->withErrors('U mag maximaal 10 tickets bestellen');
			}
			if ($last_meal_id - $max_meal_id > env('MAX_MEALS')) {
				return redirect()
					->back()->withInput()
					->withErrors('U mag maximaal 10 maaltijden bestellen');
			}*/

			Ticket::insert($tickets);
			Maaltijd::insert($meals);
			
			
    }
    
    
    }
    
    public function postReservering(Request $request)
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
                        'role' => 1,
                             
                      );
        
        
        
        $j = DB::table('users')->insertgetId($usertest);
            

        $reserveringtest = array(
            
                        'id' => DB::table('reserverings')->max('id') + 1,
                        'user' => $j,
                        'betaalmethode' => $post['betaalmethode'],
                        'totale_prijs' => 50,
                      );
                      
        $h = DB::table('reserverings')->insertgetId($reserveringtest);              
                      
                      
            
            $ticketTests = []; 
            for($i=0;$i < count($post['ticket']); $i++)
            {
                
                 $ticketTests[] = Ticket::create([
                             'ticket_type' => $post['ticket'][$i],
                             'reservering' => $h,
                             'ticketcode' => $j . $post['ticket'][$i] . $h,]
                    );
                    
                    
            }
            
            $maaltijdTests = []; 
            for($i=0;$i < count($post['maaltijd']); $i++)
            {
                
                 $maaltijdTests[] = Maaltijd::create([
                             'maaltijd_type' => $post['maaltijd'][$i],
                             'reservering' => $h,
                             'maaltijdcode' => $j . $post['maaltijd'][$i] . $h,]
                    );
                    
                    
            }
            
            
                
            
            $pdf = PDF::loadView('pdf.customer',[
                'reserveringtest' => $reserveringtest,
                'user' => $usertest,
                'tickettest' => $ticketTests,
                'maaltijdtest' => $maaltijdTests,
                ]);
            
            foreach ($ticketTests as $test){
                
                QrCode::format('png')->size(250)->generate('ticketcode: ' .$test->ticketcode,public_path(). '/src/tickets/'.$test->id.'.jpg');
            }
            
            foreach ($maaltijdTests as $maaltijd)
            {
                QrCode::format('png')->size(250)->generate('maaltijdcode: ' .$maaltijd->maaltijdcode,public_path(). '/src/maaltijden/'.$maaltijd->id.'.jpg');
            }
            
            Event::fire(new MessageTicket($reserveringtest,$usertest,$pdf));
            
            
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
    

    
    public function testDBQuery()
    {
        $slots = DB::table('slots')->get();
        
        return view('layouts.agenda.agenda', ['slots' =>$slots]);
    }
}
