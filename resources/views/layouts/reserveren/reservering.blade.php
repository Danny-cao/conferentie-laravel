@extends('layouts.master')

@section('content')


<section class="reservering"> 

        <h1> Ticket Reserveren </h1>    
        
        <form  method="post" action="{{ route('postreservering') }}" id='contact-form'>
            <div class ="input-group">
                <label for="betaalmethode">
                    Betaalmethode: 
                </label>
                <select name="betaalmethode" id="betaalmethode">
                  <option value="IDeal">IDeal</option>
                  <option value="Creditcard">Creditcard</option>
                </select>
                
                
            </div>
            <button type="submit" class="btn">Bevestigen</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
         @include('includes.info-box')
</section>


@endsection