@extends('layouts.master')

@section('content')


<section class="reservering"> 

        <h1> Ticket Reserveren </h1>    
        
        <form  method="post" action="{{ route('sendmailReservering') }}">
            <div class ="input-group">
                <label for="naam">
                    Je Naam: 
                </label>
                <input type="text" name="naam" id="naam"/>
            </div>
            
              <div class ="input-group">
                <label for="tussenvoegsel">
                    Tussenvoegsel
                </label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel"/>
            </div>
            
              <div class ="input-group">
                <label for="achternaam">
                    Achternaam
                </label>
                <input type="text" name="achternaam" id="achternaam"/>
            </div>
            
                 
            <button type="submit" class="btn">Berichtje versturen</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
        
        
        <ul>
            <li>ICT-OPEN</li>
            <li>Teststraat 6</li>
            <li>2345BH Woerden</li>
            <li>Email: Info@ict-open.nl</li>
            <li>Tel: 0348-555555</li>
        </ul>
</section>


@endsection