@extends('layouts.master')

@section('content')


<section class="Aanmelding"> 

        <h1> Aanmelding spreker </h1>
        <br><br>
         <br><br>
        <form  method="post" action="{{ route('postaanmelding') }}" id="contact-form">
             
             <div class ="input-group">
                <label for="naam">
                    naam: 
                </label>
                <input type="text" name="naam" id="naam" placeholder="naam"/>
            </div>
            
            <div class ="input-group">
                <label for="tussenvoegsel">
                    naam: 
                </label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel" placeholder="tussenvoegsel"/>
            </div>
            
            <div class ="input-group">
                <label for="achternaam">
                    naam: 
                </label>
                <input type="text" name="achternaam" id="achternaam" placeholder="achternaam"/>
            </div>
            
            <div class ="input-group">
                <label for="email">
                    naam: 
                </label>
                <input type="text" name="email" id="email" placeholder="email"/>
            </div>
            
            <div class ="input-group">
                <label for="telnummer">
                    telnummer: 
                </label>
                <input type="text" name="email" id="email" placeholder="email"/>
            </div>
            
            <div class ="input-group">
                <label for="email">
                    email: 
                </label>
                <input type="text" name="email" id="email" placeholder="email"/>
            </div>
            
            <div class ="input-group">
                <label for="adres">
                    adres: 
                </label>
                <input type="text" name="adres" id="adres" placeholder="adres"/>
            </div>
            
            
            
            
            
            
            <div class ="input-group">
                <label for="onderwerp">
                    Onderwerp: 
                </label>
                <input type="text" name="onderwerp" id="onderwerp" placeholder="onderwerp"/>
            </div>
            
              <div class ="input-group">
                <label for="wensen">
                    Wensen:
                </label>
                <input type="text" name="wensen" id="wensen" placeholder="wensen" value="{{ Request::old('wensen')}}"/>
            </div>
            
            <div class ="input-group">
                <label for="voorkeur">
                    Voorkeur:
                </label>
                <input type="number" name="voorkeur" id="voorkeur" placeholder="voorkeur"/>
            </div>
            
                  <div class ="input-group">
                <label for="omschrijving">
                   omschrijving
                </label>
                <textarea name="omschrijving" id="omschrijving" rows="10" placeholder="omschrijving">{{ Request::old('omschrijving') }}</textarea>
            </div>
            <button type="submit" class="btn">Aanmelding versturen</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
        
         @include('includes.info-box')

       
</section>


@endsection