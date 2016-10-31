@extends('layouts.master')

@section('content')

<section class="Search">
<h1>Conferentie zoeker</h1>

<br>
<p>U heeft gezocht op: <b>{{ $searchTag }}</b></p>
<br>
<p>Niks kunnen vinden? Hieronder ziet u alle beschikbare Tags:</p> 
<br>

<div class="tags">
@foreach($tags as $tag)
<tr>
    <td>{{ $tag->tag_naam }}, </td>
</tr>    

@endforeach
</div>


<br>

<h3>Resultaten</h3>

@foreach($tags as $tag)
@foreach( $slot_tags as $slot_tag )
@foreach($aanmeldingen as $aanmelding)
@foreach($slots as $slot)
@foreach($users as $user)

@if( $user->id == $aanmelding->user && $slot->id == $aanmelding->slot && $aanmelding->slot == $slot_tag->slot &&  $tag->id == $slot_tag->tag && $tag->tag_naam == $searchTag )

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
             <td>{{$user->naam}} {{ $user->tussenvoegsel }} {{ $user->achternaam}}</td>
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
@endforeach
@endforeach

             
</section>



@endsection