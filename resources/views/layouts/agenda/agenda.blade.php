@extends('layouts.master')

@section('content')

<h1>  Test agenda </h1>



  <table class ="vrijdag">

                 <tr>
                    <th>Vrijdag</th><th>Begintijd</th><th>Eindtijd</th><th>Zaal</th>
                </tr>
                @foreach($slots as $slot)
                @if($slot->dag == "zaterdag" && $slot->status == 1)
                <tr>
                    <td>Onderwerp</td>
                    <td>{{ $slot->begintijd}}</td>
                    <td>{{ $slot->eindtijd }}</td>
                    <td>{{ $slot->zaal}}</td>
                </tr>
                @endif
                @endforeach
    </table>    
             
             
    <tr>
            <th>Begintijd</th>
			<th>Eindtijd</th>    		
			<th>dag</th>
			<th>status:</th>
			</br>
	</tr>	     
    @foreach ($slots as $slot)
	
    <tr>
         <td>{{ $slot->begintijd }}</td>
         <td>{{ $slot->eindtijd }}</td>
         <td>{{ $slot->dag }}</td>
         <td>{{ $slot->status }}</td>
         </br>
    </tr>     
          
 
    @endforeach
        
 



@endsection