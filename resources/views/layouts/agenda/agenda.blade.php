@extends('layouts.master')

@section('content')

<h1>  Test agenda </h1>


             
             
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