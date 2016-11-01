@extends('layouts.master')

@section('content')
 <section class="Aanvraag"> 
<h1> Organisator Aanvragen</h1>

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
                <label for="wensen">
                    wensen:
                </label>
                <tr>
                    @foreach($aanmelding_wensen as $aanmelding_wens)
                    @foreach($wensen as $wens)
                    @if($aanmelding->id == $aanmelding_wens->aanmelding && $aanmelding_wens->wens == $wens->id)
                    <td><input type="text" name="wensen" value="{{ $wens->wens }}" readonly></td> 
                    @endif
                    @endforeach
                    @endforeach
                </tr>
            </div>
            
            <div class ="input-group">
                <label for="slot">
                    slot:
                </label>
                <tr>
                    <td><input type="number" name="slotAanvraag" id="slotAanvraag" value="{{ $slot->id }}"  readonly></td> 
                    <td>{{$slot->begintijd}} - {{ $slot->eindtijd }} - {{ $slot->zaal }} - {{ $slot->dag }}</td>
                </tr>

            </div>
            
            
            <div class ="input-group">
                <label for="voorkeur">
                    voorkeur:
                </label>
                <tr>
                    <td><input type="number" name="slot" value="{{ $aanmelding->voorkeur }}"></td> 
                    <td>{{$slot->begintijd}} - {{ $slot->eindtijd }} - {{ $slot->zaal }} - {{ $slot->dag }}</td>
                </tr>
            </div>
            
             <div class ="input-group">
                <label for="slot">
                    Beoordeling:
                </label>
                <tr>
                    <select name="beoordeling">
                    <option value="accept">Accepteren</option>
                    <option value="1">verwerpen</option>
                      
                    </select>
                </tr>

            
            </div>
            
            <div class ="input-group">
                <label for="slot">
                    Tags toevoegen:
                </label>
                <tr>
                    <select name="tags[]">
                        <option value="geen">tag 1</option>
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->tag_naam}}</option>
                        @endforeach
                    </select>
                    
                       <select name="tags[]">
                        <option value="geen">tag 2</option>   
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->tag_naam}}</option>
                        @endforeach
                    </select>
                    
                    <select name="tags[]">
                        <option value="geen">tag 3</option>
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->tag_naam}}</option>
                        @endforeach
                    </select>
                </tr>

            
            </div>
            
            <button type="submit" class="btn">bevestigen</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
            <br>
            <hr style="height:3px;border:none;color:#333;background-color:#333;" />
        </form>
        @endif
        @endforeach
        @endforeach
        @endforeach
        
         @include('includes.info-box')

       
</section>


@endsection