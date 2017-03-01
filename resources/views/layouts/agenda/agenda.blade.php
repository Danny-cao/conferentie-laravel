@extends('layouts.master')
@section('content')

  <div class="container">
    <div class="col-sm-5">
        <h2> Vrijdag </h2>
        <div class="vrijdag-agenda">
            <table>
                <tr>
                    <th>Begintijd - Eindtijd</th>
                    <th>Onderwerp</th>
                    <th>Zaal</th>
                    <th>Status</th>
                    
                </tr>
                @foreach($vrijdags as $vrijdag)
                <tr class="status{{ $vrijdag->id}}">
                <td>{{ $vrijdag->begintijd }} - {{ $vrijdag->eindtijd }}</td>
                <td> {{ $vrijdag->onderwerp }}</td>
                <td> {{ $vrijdag->zaalnaam }}</td>
                <td>{{ $vrijdag->status }}</td>
                  
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    
    <div class="col-sm-5">
        <h2> Zaterdag </h2>
        <div class="zaterdag-agenda">
            <table>
                <tr>
                    <th>Begintijd - Eindtijd</th>
                    <th>Onderwerp</th>
                    <th>Zaal</th>
                    <th>Status</th>
                    
                </tr>
                @foreach($zaterdags as $zaterdag)
                <tr class="status{{$zaterdag->id}}">
                <td>{{ $zaterdag->begintijd }} - {{ $zaterdag->eindtijd }}</td>
                <td> {{ $zaterdag->onderwerp }}</td>
                <td> {{ $zaterdag->zaalnaam }}</td>
                <td>{{ $zaterdag->status }}</td>
                  
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    
    <div class="col-sm-5">
        <h2> Zondag </h2>
        <div class="zondag-agenda">
            <table>
                <tr>
                    <th>Begintijd - Eindtijd</th>
                    <th>Onderwerp</th>
                    <th>Zaal</th>
                    <th>Status</th>
                    
                </tr>
                @foreach($zondags as $zondag)
                <tr class="status{{$zondag->id}}">
                <td>{{ $zondag->begintijd }} - {{ $zondag->eindtijd }}</td>
                <td> {{ $zondag->onderwerp }}</td>
                <td> {{ $zondag->zaalnaam }}</td>
                <td>{{ $zondag->status }}</td>
                  
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
@endsection