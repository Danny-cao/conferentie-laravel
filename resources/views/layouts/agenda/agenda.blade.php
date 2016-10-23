@extends('layouts.master')

@section('content')

<section class ="Agenda">
<h1>  Test agenda </h1>



  <table class ="vrijdag">

                 <tr>
                    <th>Vrijdag</th><th>Begintijd</th><th>Eindtijd</th><th>Zaal</th>
                </tr>
                @foreach($slots as $slot)
                @if($slot->dag == "vrijdag")
                <tr>
                    <td>Onderwerp</td>
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                </tr>
                @endif
                @endforeach
    </table>    
    <table class ="zaterdag">

                 <tr>
                    <th>zaterdag</th><th>Begintijd</th><th>Eindtijd</th><th>Zaal</th>
                </tr>
                @foreach($slots as $slot)
                @if($slot->dag == "zaterdag")
                <tr>
                    <td>Onderwerp</td>
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                </tr>
                @endif
                @endforeach
    </table>    
     <table class ="zondag">

                 <tr>
                    <th>zaterdag</th><th>Begintijd</th><th>Eindtijd</th><th>Zaal</th>
                </tr>
                @foreach($slots as $slot)
                @if($slot->dag == "zondag")
                <tr>
                    <td>Onderwerp</td>
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                </tr>
                @endif
                @endforeach
    </table>    
             
</section>
@endsection