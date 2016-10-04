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
        $name = 'test';
        
         Mail::send('emails.send_ticket_mail', ['ticket_message' => $name], function($m) use ($name){
           $m->from('info@ict-open.nl',' Conferentie ICT-OPEN');
           $m->to('danny.dc.cao@gmail.com', 'Ticket bevestiging');
           $m->subject('Ticket bevestiging');
       });
    }
}
