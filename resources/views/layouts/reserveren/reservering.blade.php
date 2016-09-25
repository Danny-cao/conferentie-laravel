@extends('layouts.master')

@section('content')


<section class="reservering"> 

        <h1> Ticket Reserveren </h1>    
        
        <form  method="post" action="{{ route('postreservering') }}" id='reserveren'>
            
            <div class ="input-group">
                <label for="ticket">
                    Kies een ticket: 
                </label>
                <input type="radio" name="ticket" id="ticket" value="1"> Vrijdag<br>
                <input type="radio" name="ticket" id="ticket" value="2"> Zaterdag<br>
                <input type="radio" name="ticket" id="ticket" value="3"> Zondag<br>
                <input type="radio" name="ticket" id="ticket" value="4"> Weekend<br>
                <input type="radio" name="ticket" id="ticket" value="5"> Passe-partout<br>
            </div>
            
             <div class ="input-group">
                <label for="naam">
                    Voornaam: 
                </label>
                <input type="text" name="naam" id="naam" placeholder="je naam"/>
            </div>
            
               <div class ="input-group">
                <label for="tussenvoegsel">
                    Tussenvoegsel: 
                </label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel" />
            </div>
            
            <div class ="input-group">
                <label for="achternaam">
                    achternaam: 
                </label>
                <input type="text" name="achternaam" id="achternaam"/>
            </div>
            
            <div class ="input-group">
                <label for="email">
                    email: 
                </label>
                <input type="text" name="email" id="email"/>
            </div>
            
            <div class ="input-group">
                <label for="telnummer">
                    telnummer: 
                </label>
                <input type="text" name="telnummer" id="telnummer"/>
            </div>
            
            <div class ="input-group">
                <label for="adres">
                    adres: 
                </label>
                <input type="text" name="adres" id="adres"/>
            </div>
            
            <div class ="input-group">
                <label for="woonplaats">
                    woonplaats: 
                </label>
                <input type="text" name="woonplaats" id="woonplaats"/>
            </div>
            
            
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