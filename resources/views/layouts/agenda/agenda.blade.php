@extends('layouts.master')

@section('content')

<section class ="Agenda">
<h1>  Test agenda </h1>



<table class ="vrijdag">
                <tr>
                  <th>vrijdag</th>
                </tr>
                 <tr>
                    <th>Begintijd</th><th>Eindtijd</th><th>Zaal</th><th>Status</th><th></th><th>Onderwerp</th>
                </tr>
                @foreach($slots as $slot)
                @foreach($statuses as $status)
                @if($slot->dag == "vrijdag" && $slot->status == $status->id )
                <tr>
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                    <td>{{ $status->status}}<td>
                @foreach($aanmeldingen as $aanmelding)
                @if($status->status == "bezet" && $slot->id == $aanmelding->slot)
                    <td> {{ $aanmelding->onderwerp }}</td>
                @endif    
                @endforeach
                @endif
                @endforeach
                @endforeach
    </table>    
    <table class ="zaterdag">
                 <tr>
                   <th>zaterdag</th>
                </tr>
                 <tr>
                <th>Begintijd</th><th>Eindtijd</th><th>Zaal</th><th>status</th><th></th><th>Onderwerp</th>
                </tr>
                @foreach($slots as $slot)
                @foreach($statuses as $status)
                @if($slot->dag == "zaterdag" && $slot->status == $status->id)
                <tr>
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                    <td>{{ $status->status}}<td>
                @foreach($aanmeldingen as $aanmelding)
                @if($status->status == "bezet" && $slot->id == $aanmelding->slot)
                    <td> {{ $aanmelding->onderwerp }}</td>
                @endif    
                @endforeach        
                </tr>
                @endif
                @endforeach
                @endforeach
    </table>    
     <table class ="zondag">
                <tr>
                   <th>Zondag</th>
                </tr>
                 <tr>
                     
                  <th>Begintijd</th><th>Eindtijd</th><th>Zaal</th><th>status</th><th></th><th></th><th>Onderwerp</th>
                </tr>
                @foreach($slots as $slot)
                @foreach($statuses as $status)
                @if($slot->dag == "zondag" && $slot->status == $status->id)
                <tr>
                    <td>Onderwerp</td>
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                    <td>{{ $status->status}}<td>
                @foreach($aanmeldingen as $aanmelding)
                @if($status->status == "bezet" && $slot->id == $aanmelding->slot)
                    <td> {{ $aanmelding->onderwerp }}</td>
                @endif    
                @endforeach                
                </tr>
                @endif
                @endforeach
                @endforeach
    </table>    
             
</section>



@endsection