@extends('layouts.master')

@section('content')

<section class="sprekers">
<h1> Organisator sprekers</h1>

@foreach($sprekers as $spreker)
@foreach($aanmeldingen as $aanmelding)
@foreach($slots as $slot)
@if( $spreker->id == $aanmelding->user && $aanmelding->slot == $slot->id && $slot->status == 3)

<div class="search-table">
        <table class="search-table-table">
            <tr>
                <th>Spreker</th>
                <th>Onderwerp</th>
                <th>Omschrijving</th>
                <th>Begintijd - Eindtijd</th>
                <th>Zaal</th>
                <th>Dag</th>
            </tr>    
            <tr>
             <td>{{$spreker->naam}} {{ $spreker->tussenvoegsel }} {{ $spreker->achternaam}}</td>
             <td>{{$aanmelding->onderwerp}}</td>
             <td>{{$aanmelding->omschrijving }}</td>
             <td>{{$slot->begintijd}} - {{ $slot->eindtijd }}</td>
             <td>{{$slot->zaal}}</td>
             <td>{{$slot->dag}}</td>
            </tr>
        </table>
    </div>
    <br>
@endif
@endforeach
@endforeach    
@endforeach

</section>
@endsection