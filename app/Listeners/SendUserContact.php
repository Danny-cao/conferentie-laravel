<?php

namespace App\Listeners;

use App\Events\contact;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendUserContact
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  contact  $event
     * @return void
     */
    public function handle(contact $event)
    {
       $contact_message = $event->message;
       
       Mail::send('emails.send_contact_mail', ['contact_message' => $contact_message], function($m) use ($contact_message){
           $m->from('info@ict-open.nl',' Conferentie ICT-OPEN');
           $m->to($contact_message->email, $contact_message->sender);
           $m->subject('Contact ontvangen');
       });
    }
}
