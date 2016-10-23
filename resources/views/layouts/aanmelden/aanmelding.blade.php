@extends('layouts.master')

@section('content')


<section class="Aanmelding"> 



        <h1> Aanmelding spreker </h1>
        <br><br>
         <br><br>
        <form  method="post" action="{{ route('postaanmelding') }}" id="contact-form">
            
            <p> Beschikbare Slots:</p>
            <table class ="vrijdag">
              
                 <tr>
                    <th>Vrijdag</th><th>Begintijd</th><th>Eindtijd</th><th>Zaal</th>
                </tr>
                @foreach($Slots as $slot)
                @if($slot->dag == "vrijdag" && $slot->status == 1)
                <tr>
                    <td><input type="radio" name="slot" value="{{ $slot->id }}"></td> 
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                </tr>
                @endif
                @endforeach
                
                
            </table>
            
            <table class ="zaterdag">

                 <tr>
                    <th>Zaterdag</th><th>Begintijd</th><th>Eindtijd</th><th>Zaal</th>
                </tr>
                @foreach($Slots as $slot)
                @if($slot->dag == "zaterdag" && $slot->status == 1)
                <tr>
                    <td><input type="radio" name="slot" value="{{ $slot->id }}"></td> 
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                </tr>
                @endif
                @endforeach
            </table>    
                
            <table class ="zondag">
                
                 <tr>
                    <th>Zondag</th><th>Begintijd</th><th>Eindtijd</th><th>Zaal</th>
                </tr>
                @foreach($Slots as $slot)
                @if($slot->dag == "zondag" && $slot->status == 1)
                <tr>
                    <td><input type="radio" name="slot" value="{{ $slot->id }}"></td> 
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                </tr>
                @endif
                @endforeach
                
            </table>
            
             <h2> Vul hier uw gegevens in: </h2>
             <div class ="input-group">
                <label for="naam">
                    naam: 
                </label>
                <input type="text" name="naam" id="naam" placeholder="naam"/>
            </div>
            
            <div class ="input-group">
                <label for="tussenvoegsel">
                    tussenvoegsel: 
                </label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel" placeholder="tussenvoegsel"/>
            </div>
            
            <div class ="input-group">
                <label for="achternaam">
                    achternaam: 
                </label>
                <input type="text" name="achternaam" id="achternaam" placeholder="achternaam"/>
            </div>
            
            <div class ="input-group">
                <label for="email">
                    email: 
                </label>
                <input type="text" name="email" id="email" placeholder="email"/>
            </div>
            
            <div class ="input-group">
                <label for="telnummer">
                    telnummer: 
                </label>
                <input type="text" name="telnummer" id="telnummer" placeholder="telnummer"/>
            </div>
            
            <div class ="input-group">
                <label for="adres">
                    adres: 
                </label>
                <input type="text" name="adres" id="adres" placeholder="adres"/>
            </div>
            
            <div class ="input-group">
                <label for="woonplaats">
                    woonplaats: 
                </label>
                <input type="text" name="woonplaats" id="woonplaats" placeholder="woonplaats"/>
            </div>
            
            
            
            
            
            
            <div class ="input-group">
                <label for="onderwerp">
                    Onderwerp: 
                </label>
                <textarea name="onderwerp" id="onderwerp" rows="10" placeholder="Vul hier uw onderwerp in">{{ Request::old('onderwerp') }}</textarea>
            </div>
            
            <div class ="input-group">
                <label for="omschrijving">
                   omschrijving
                </label>
                <textarea name="omschrijving" id="omschrijving" rows="10" placeholder="Vul de omschrijving van het onderwerp ">{{ Request::old('omschrijving') }}</textarea>
            </div>
            
              <div class ="input-group">
                <label for="wensen">
                    Wensen:
                </label>
                @foreach($Wensen as $wens) 
                 <input type="checkbox" name="wens[]" value="{{$wens->id }}">{{ $wens->wens }}<br>
                @endforeach
            </div>
            
            <div class ="input-group">
                <label for="voorkeur">
                    Voorkeur:
                </label>
            
            
            <table class ="vrijdag-voorkeur">
              
                 <tr>
                    <th>Vrijdag</th><th>Begintijd</th><th>Eindtijd</th><th>Zaal</th>
                </tr>
                @foreach($Slots as $slot)
                @if($slot->dag == "vrijdag" && $slot->status == 2)
                <tr>
                    <td><input type="radio" name="voorkeur" value="{{ $slot->id }}"></td> 
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                </tr>
                @endif
                @endforeach
                
            </table>
            
            <table class ="zaterdag-voorkeur">

                 <tr>
                    <th>Zaterdag</th><th>Begintijd</th><th>Eindtijd</th><th>Zaal</th>
                </tr>
                @foreach($Slots as $slot)
                @if($slot->dag == "zaterdag" && $slot->status == 2)
                <tr>
                    <td><input type="radio" name="voorkeur" value="{{ $slot->id }}"></td> 
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                </tr>
                @endif
                @endforeach
                
            </table>    
                
            <table class ="zondag-voorkeur">
                
                 <tr>
                    <th>Zondag</th><th>Begintijd</th><th>Eindtijd</th><th>Zaal</th>
                </tr>
                @foreach($Slots as $slot)
                @if($slot->dag == "zondag" && $slot->status == 2)
                <tr>
                    <td><input type="radio" name="voorkeur" value="{{ $slot->id }}"></td> 
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                </tr>
                @endif
                @endforeach
                
            </table>

            
            </div>
            
            <button type="submit" class="btn">Aanmelding versturen</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
        
         @include('includes.info-box')

       
</section>


@endsection