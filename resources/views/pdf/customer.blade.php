
        @foreach($tickettest as $test)
        <ul>
             <li>Ticket:</li>
             <li><img src="http://conferentie-dannycao.c9users.io/src/tickets/{{ $test->id }}.jpg"></li>
        </ul>     
          @endforeach
          
          
          @foreach($maaltijdtest as $maaltijd)
        <ul>
             <li>Maaltijd:</li>
             <li><img src="http://conferentie-dannycao.c9users.io/src/maaltijden/{{ $maaltijd->id }}.jpg"></li>
        </ul>     
          @endforeach
