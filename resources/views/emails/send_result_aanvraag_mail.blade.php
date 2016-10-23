

<h1> U bent geaccepteerd voor een Slot!! </h1>

@foreach($aanmeldingen as $aanmelding)
@foreach($slots as $slot)
@if($aanmelding->slot == $gekozen_slot && $gekozen_slot == $slot->id)
    
    <h2> Onderwerp en omschrijving </h2>
    {{ $aanmelding->onderwerp }}</br>
    {{ $aanmelding->omschrijving }}</br>
    </br>
    <h2> Tijden en dagen</h2>
    {{ $slot->zaal}}</br>
    {{ $slot->begintijd}}</br>
    {{ $slot->eindtijd}}</br>
    {{ $slot->dag}}</br>

@endif
@endforeach
@endforeach