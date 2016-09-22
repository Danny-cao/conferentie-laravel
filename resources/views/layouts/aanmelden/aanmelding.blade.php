@extends('layouts.master')

@section('content')


<section class="Aanmelding"> 

        <h1> Aanmelding spreker </h1>
        <br><br>
         <br><br>
        <form  method="post" action="{{ route('postaanmelding') }}" id="contact-form">
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