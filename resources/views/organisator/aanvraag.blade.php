@extends('layouts.master')

@section('content')
 <section class="Aanvraag"> 
<h1> Organisator Aanvragen</h1>


   
   
   <!-- <table class ="aanvragen">
    <form type="post">
         <tr>
            <th></th><th>onderwerp</th><th>omschrijving</th>
        </tr>
        @foreach($aanmeldingen as $aanmelding)
        @foreach($slots as $slot)
        @if( $aanmelding->slot == $slot->id)
        <tr>
            <td><input type="radio" name="slot" value="{{ $aanmelding->id }}"></td>
            <td>{{ $aanmelding->onderwerp }}</td>
            <td>{{ $aanmelding->omschrijving }}</td>
        </tr>
        @endif
        @endforeach
        @endforeach
        <td><input type="button" name="accepteren" value="accepteren"/></td> 
        <td><input type="button" name="verwerpen" value="verwerpen"/></td> 
    </form>
    </table>    
    
    -->
    
   

        <br><br>
         <br><br>
         @foreach($users as $user)
         @foreach($aanmeldingen as $aanmelding)
         @foreach($slots as $slot)
         @if( $aanmelding->slot == $slot->id && $aanmelding->user == $user->id && $slot->status == 2)
        <form  method="post" action="{{ route('postaanvraag') }}" id="contact-form">
            
             <div class ="input-group">
                <label for="naam">
                    naam: 
                </label>
                <input type="text" name="naam" id="naam" value="{{ $user->naam }}" readonly/>
            </div>
            
            <div class ="input-group">
                <label for="tussenvoegsel">
                    tussenvoegsel: 
                </label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel" value="{{ $user->tussenvoegsel }}" readonly/>
            </div>
            
            <div class ="input-group">
                <label for="achternaam">
                    achternaam: 
                </label>
                <input type="text" name="achternaam" id="achternaam" value="{{ $user->achternaam }}" readonly/>
            </div>
            
              <div class ="input-group">
                <label for="email">
                    achternaam: 
                </label>
                <input type="text" name="email" id="email" value="{{ $user->email }}" readonly/>
            </div>
            
            
            <div class ="input-group">
                <label for="onderwerp">
                    Onderwerp: 
                </label>
                <textarea name="onderwerp" id="onderwerp" rows="10" value="{{ $aanmelding->onderwerp }}"  readonly>{{ $aanmelding->onderwerp }}</textarea>
            </div>
            
            <div class ="input-group">
                <label for="omschrijving">
                   omschrijving
                </label>
                <textarea name="omschrijving" id="omschrijving" rows="10" value"{{ $aanmelding->omschrijving }}"  readonly>{{$aanmelding->omschrijving }}</textarea>
            </div>
            
            
            <div class ="input-group">
                <label for="slot">
                    Voorkeur:
                </label>
                <tr>
                    <td><input type="number" name="slotAanvraag" id="slotAanvraag" value="{{ $slot->id }}"  readonly></td> 
                    <td>{{$slot->begintijd}} - {{ $slot->eindtijd }} - {{ $slot->zaal }} - {{ $slot->dag }}</td>
                </tr>

            
            </div>
            
            
            <div class ="input-group">
                <label for="voorkeur">
                    Slot:
                </label>
                <tr>
                    <td><input type="number" name="slot" value="{{ $aanmelding->voorkeur }}"></td> 
                    <td>{{$slot->begintijd}} - {{ $slot->eindtijd }} - {{ $slot->zaal }} - {{ $slot->dag }}</td>
                </tr>

            
            </div>
            
            <button type="submit" class="btn">accepteren</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
        @endif
        @endforeach
        @endforeach
        @endforeach
        
         @include('includes.info-box')

       
</section>


@endsection