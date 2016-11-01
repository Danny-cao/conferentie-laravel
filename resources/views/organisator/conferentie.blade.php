@extends('layouts.master')

@section('content')

<section class ="Agenda">
<h1> Open slots </h1>

<table class ="vrijdag">
                <tr>
                  <th>vrijdag</th>
                </tr>
                 <tr>
                    <th>Begintijd</th><th>Eindtijd</th><th>Zaal</th><th>Status</th><th></th>
                </tr>
                @foreach($slots as $slot)
                @foreach($statuses as $status)
                @if($slot->dag == "vrijdag" && $slot->status == $status->id && $slot->status == 1)
                <tr>
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                    <td>{{ $status->status}}<td>
                </tr>
                @endif
                @endforeach
                @endforeach
    </table>    
    <table class ="zaterdag">
                 <tr>
                   <th>zaterdag</th>
                </tr>
                 <tr>
                <th>Begintijd</th><th>Eindtijd</th><th>Zaal</th><th>status</th><th></th>
                </tr>
                @foreach($slots as $slot)
                @foreach($statuses as $status)
                @if($slot->dag == "zaterdag" && $slot->status == $status->id && $slot->status == 1)
                <tr>
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                    <td>{{ $status->status}}<td>
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
                     
                  <th>Begintijd</th><th>Eindtijd</th><th>Zaal</th><th>status</th><th></th><th></th>
                </tr>
                @foreach($slots as $slot)
                @foreach($statuses as $status)
                @if($slot->dag == "zondag" && $slot->status == $status->id && $slot->status == 1)
                <tr>
                    <td>Onderwerp</td>
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                    <td>{{ $status->status}}<td>
                </tr>
                @endif
                @endforeach
                @endforeach
    </table>    
             
</section>
@endsection