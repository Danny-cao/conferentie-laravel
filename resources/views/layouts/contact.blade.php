@extends('layouts.master')
@section('content')
<section class="contact"> 
        <h1> Contact </h1>
        <br><br>
        <ul>
            <li>ICT-OPEN</li>
            <li>Teststraat 6</li>
            <li>2345BH Woerden</li>
            <li>Email: Info@ict-open.nl</li>
            <li>Tel: 0348-555555</li>
        </ul>
         <br><br>
        <form  method="post" action="{{ route('contact.send') }}" id="contact-form">
            <div class ="input-group">
                <label for="name">
                    Je Naam: 
                </label>
                <input type="text" name="name" id="name" placeholder="je naam" value="{{ Request::old('name')}}"/>
            </div>
              <div class ="input-group">
                <label for="email">
                    Je Email
                </label>
                <input type="text" name="email" id="email" placeholder="Je email" value="{{ Request::old('email')}}"/>
            </div>
            <div class ="input-group">
                <label for="subject">
                    Betreft
                </label>
                <input type="text" name="subject" id="subject" placeholder="Subject" value="{{ Request::old('subject')}}"/>
            </div>
                  <div class ="input-group">
                <label for="message">
                    Je bericht
                </label>
                <textarea name="message" id="message" rows="5" placeholder="Bericht">{{ Request::old('message') }}</textarea>
            </div>
            <button type="submit" class="btn">Berichtje versturen</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
         @include('includes.info-box')
</section>
@endsection