@extends('layouts.master')

@section('content')

<section class="Search">
<h1>Conferentie zoeker</h1>

<br>
<p>U heeft gezocht op: <b>{{ $searchTag }}</b></p>
<br>
<p>Niks kunnen vinden? Hieronder ziet u alle beschikbare Tags:</p> 
@foreach($allTags as $tags)
<td>{{ $tags->tag_naam }},</td>
@endforeach
<br>

<br>

<h3>Resultaten</h3>

@foreach($slots_search as $slot_search)
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
                 <td>{{ $slot_search->naam }}</td>
                 <td>{{ $slot_search->onderwerp }}</td>
                 <td>{{ $slot_search->omschrijving }}</td>
                 <td>{{ $slot_search->begintijd }} - {{ $slot_search->eindtijd }}</td>
                 <td>{{ $slot_search->zaal }}</td>
                 <td>{{ $slot_search->dag }}</td>
            </tr>
        </table>
    </div>
    <br>

@endforeach
 
             
</section>



@endsection