
        @foreach($ticketTests as $test)
        <ul>
             <li>Ticket:</li>
             <li><img src="http://conferentie-dannycao.c9users.io/src/tickets/{{ $test->id }}.jpg"></li>
             <br>
             <li>Maaltijd:</li>
             <li><img src="http://conferentie-dannycao.c9users.io/src/tickets/{{ $test->idMaaltijd }}.jpg"></li>
        </ul>     
          @endforeach