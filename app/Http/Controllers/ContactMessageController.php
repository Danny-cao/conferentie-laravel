<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ContactMessage;
use App\Events\contact;
use Illuminate\Support\Facades\Event;

class ContactMessageController extends Controller
{
    public function getContactIndex()
    {
        return view('layouts.contact');
    }
    
    public function postSendMessage(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required|max:50',
            'subject' => 'required|max:100',
            'message' => 'required|min:10'
            ]);
        $message = new ContactMessage();
        $message->email = $request['email'];
        $message->sender = $request['name'];
        $message->subject = $request['subject'];
        $message->body = $request['message'];
        $message->save();
        Event::fire(new contact($message));
        return redirect()->route('contact')->with(['success' => 'Message succesfully sent!']);
    }
}
