<table>
    <tr>
        <td><b>Reservering Tickets/Maaltijden<b></td><br>
        <td>Lunch tijden: 12:00 - 13:30</td><br>
        <td>Diner tijden: 17:30 - 20:00</td><br>
        </tr>
</table>    

<table>
    <tr>
        <td><b>Conferentie dagen/tijden<b></td><br>
        <td>Vrijdag tijden: 15:30 - 22:30</td><br>
        <td>Zaterdag tijden: 10:15 - 21:30</td><br>
        <td>Zondag tijden: 12:15 - 13:15</td><br>
        </tr>
</table>   

<table>
    <tr>
        <td><b>Bedankt voor de reservering !<b></td><br>
        </tr>
</table>   

        @foreach($tickettest as $test)
        @foreach($ticketTypes as $ticketType)
        <ul style="list-style-type: none">
         @if($test->ticket_type == $ticketType->id)    
          <hr>
             <li>Ticket:</li>
             <li>{{ $ticketType->ticket_naam}}</li>
            
             <li><img src="src/tickets/{{ $test->id }}.jpg"></li>
              <hr>
         @endif     
        </ul>     
       
          @endforeach    
          @endforeach
          
@if(isset($maaltijdtest) )       
          @foreach($maaltijdtest as $maaltijd)
          @foreach($maaltijdTypes as $maaltijdType)
        <ul style="list-style-type: none">
         @if($maaltijd->maaltijd_type == $maaltijdType->id)
          <hr>
             <li>Maaltijd:</li>
             <li>{{ $maaltijdType->maaltijd_naam }}</li>
             <li>{{ $maaltijd->dag }}
          
             <li><img src="src/maaltijden/{{ $maaltijd->id }}.jpg"></li>
              <hr>
        @endif              
        </ul>     
          @endforeach    
          @endforeach
@endif