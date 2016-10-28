<?php

namespace App\Listeners;

use App\Events\MessageTicket;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendTicket
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  MessageTicket  $event
     * @return void
     */
    public function handle(MessageTicket $event)
    {
        $reservering_ticket = $event->reservering;
        $user = $event->user;
        $pathToFile =  $event->pdf;
        //$beschikbaar = $event->magkopen;
        //dd($pathToFile);
        
        
         Mail::send('emails.send_ticket_mail', ['reservering_ticket' => $reservering_ticket, 'user' => $user, 'pathToFile' => $pathToFile], function($m) use ($reservering_ticket,$user,$pathToFile){
           $m->from('info@ict-open.nl',' Conferentie ICT-OPEN');
           $m->to($user['email'],$user['naam']);
           $m->subject('ticket Reservering');
           $m->attachData($pathToFile->output(),'ticket.pdf');
       });
    }
}
