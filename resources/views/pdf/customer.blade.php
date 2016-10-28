
        @foreach($tickettest as $test)
        @foreach($ticketTypes as $ticketType)
        <ul>
         @if($test->ticket_type == $ticketType->id)    
             <li>Ticket:</li>
             <li>{{ $ticketType->ticket_naam}}</li>
            
             <li><img src="http://conferentie-dannycao.c9users.io/src/tickets/{{ $test->id }}.jpg"></li>
         @endif     
        </ul>     
          @endforeach    
          @endforeach
          
@if(isset($maaltijdtest) )       
          @foreach($maaltijdtest as $maaltijd)
          @foreach($maaltijdTypes as $maaltijdType)
        <ul>
         @if($maaltijd->maaltijd_type == $maaltijdType->id)
             <li>Maaltijd:</li>
             <li>{{ $maaltijdType->maaltijd_naam }}</li>
          
             <li><img src="http://conferentie-dannycao.c9users.io/src/maaltijden/{{ $maaltijd->id }}.jpg"></li>
        @endif              
        </ul>     
          @endforeach    
          @endforeach
@endif