@extends('layouts.master')
@section('content')

<script type="text/javascript">

    $(function(){
        /* ************************ Algemene functies ************************ */
        /* Verander functie voor change Values van totale prijzen */
        function veranderPrijs() {
            var sumTickets = 0;
            $('.price').each(function(i, obj) {
                sumTickets += $(this).val()*1;
            });
            
            var ticketCounter = 0;
            $('.onecount').each(function(i, obj) {
                ticketCounter += $(this).val()*1;
            });
            
            document.getElementById("totaalTicket").value = sumTickets;
            //document.getElementById("totaalMaaltijd").value = sumMeals;
            document.getElementById("counter").value = ticketCounter;
            //document.getElementById("totaalReservering").value = sumMeals + sumTickets;
        }
        /* ************************ Ticket ************************ */
        /* Add row ticket */
        $('.addticket').click(function(){
            var ticket = $('.ticket').html();
            var n = ($('.body_ticket tr').length-0)+1;
            
            var newTicketRow = '<tr><th class="no">'+ n +'</th>' +
                '<td><select name="ticket[]" class="ticket">'+ ticket +'</select></td>' + 
        		'<td><input type="text" name="price[]" class="price" value="25" readonly></td>' + 
        		'<td><input type="hidden" name="onecount[]" class="onecount" value="1" readonly></td>' + 
        		'<td><a href="#" class="btn btn-danger delete">verwijder</a></td></tr>';
            $('.body_ticket').append(newTicketRow);	
            
            veranderPrijs();
        });
    
    
        /* Delete selected row ticket */
        $(".body_ticket").delegate(".delete", "click", function() {
            $(this).parent().parent().remove();
            
            veranderPrijs();
        });
        
        /* Change value depending on type Ticket */
        $('.body_ticket').delegate(".ticket", "change", function() {
            var newTicketRow = $(this).parent().parent();
            var prijs = newTicketRow.find(".ticket option:selected").attr("ticket-prijs");
            var onecount = newTicketRow.find(".onecount").attr("value");
            newTicketRow.find(".price").val(prijs);
            newTicketRow.find(".onecount").val(onecount);
            veranderPrijs();
        });
        
        
             /* ************************ Maaltijd ************************ */
        /* Add row maaltijd */
     
        
    });
    
</script>

<section class="reservering"> 
    <h1>Bijeenkomst Zaterdag</h1>
    <div class="table table-bordered table-hover">
         <table>
            <tr>
                <th>dag</th>
                <th>begintijd</th>
                <th>eindtijd</th>
            </tr>    

            <tr>
             <td>Zaterdag</td>
             <td>13:30</td> 
             <td>19:30</td>
            </tr>

        </table>
        <table>
            <tr>
                <th>Ticket</th>
                <th>Prijs</th>
                <th>aantal beschikbaar</th>
            </tr>    
            @foreach($tickets as $ticket)
            @if($ticket->id == 6)
            <tr>
             <td>{{$ticket->ticket_naam }}</td>
             <td>{{$ticket->prijs }}</td>
            @if($ticket->id == 6)
             <td>{{$ticket->aantal_beschikbaar }}</td>
            </tr>
            @endif
            @endif
            @endforeach
        </table>
    </div>
    <br>
    <div class="input-group">
        @include('includes.info-box')
        
        <form  method="post" action='{{ route('postbijeenkomst') }}' id='reserveren'>
            
            <!-- ******* Ticket ******* -->
            <div class="col-md-6">
                <table>
                    <thead>
                        <tr>
                            <th>Nr.</th>
                            <th>Soort ticket</th>
                            <th>Prijs</th>
                        </tr>
                    </thead>
                    <tbody class="body_ticket">
                        <label for="ticket">
                            Kies een ticket: 
                        </label><br>
                        <tr>
                            <th class="no">1</th>
                            <td>
                                <select name="ticket[]" class="ticket">
                                    @foreach($tickets as $ticket)
                                    @if($ticket->id == 6)
                                        <option ticket-prijs="{{ $ticket->prijs }}" value="{{ $ticket->id }}">{{ $ticket->ticket_naam }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="price[]" class="price" value="25" readonly>
                            </td>
                            <td>
                                <input type="hidden" name="onecount[]" class="onecount" value="1" readonly>
                            </td>
                        </tr>
                        <button type="button" class="btn addticket" value="+">Ticket Toevoegen</button><br>
                    </tbody>
                </table>
            </div>
                 <!-- ******* Maaltijd ******* -->
        
            
            <div class ="totaaldiv col-md-12">
                <center>
                    <table>
                        <tr>
                           <td><label for="totaal">Totaal ticket: </label></td>
                            <td><input type="text" id="totaalTicket" name="totaalTicket" class="totaalTicket" value="25" readonly></td>
                        </tr>
                        
                         <tr>
                           
                            <td><input type="hidden" id="counter" name="counter" class="counter" value="1" readonly></td>
                        </tr>
                    
                       <!-- <tr>
                            <td><label for="totaal">Totaal prijs: </label></td>
                            <td><input type="text" id="totaalReservering" name="totaalReservering" class="totaalReservering" value="25" readonly></td>
                        </tr>-->
                    </table>
                </center>
            </div>
            
            
            <div class ="input-group">
                <table>
                    <tr>
                        <td><label for="naam">Reserveringscode: </label></td>
                        <td><input type="text" name="reserveringscode" id="reserveringscode" value="{{ app('request')->input('code') }}" placeholder="reserveringscode"/></td>
                    </tr>
                    <tr>
                        <td><label for="naam">Voornaam: </label></td>
                        <td><input type="text" name="naam" id="naam" placeholder="naam"/></td>
                    </tr>
                    <tr>
                        <td><label for="tussenvoegsel">Tussenvoegsel: </label></td>
                        <td><input type="text" name="tussenvoegsel" id="tussenvoegsel" placeholder="tussenvoegsel"/></td>
                    </tr>
                    <tr>
                        <td><label for="achternaam">Achternaam: </label></td>
                        <td><input type="text" name="achternaam" id="achternaam" placeholder="achternaam"/></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email: </label></td>
                        <td><input type="text" name="email" id="email" placeholder="Danny@danny.nl"/></td>
                    </tr>
                    <tr>
                        <td><label for="telnummer">Telnummer: </label></td>
                        <td><input type="text" name="telnummer" id="telnummer" placeholder="telnummer"/></td>
                    </tr>
                    <tr>
                        <td><label for="adres">Adres: </label></td>
                        <td><input type="text" name="adres" id="adres" placeholder="adres"/></td>
                    </tr>
                    <tr>
                        <td><label for="woonplaats">Woonplaats: </label></td>
                        <td><input type="text" name="woonplaats" id="woonplaats" placeholder="woonplaats"/></td>
                    </tr>
                    <tr>
                        <td><label for="betaalmethode">Betaalmethode: </label></td>
                        <td>
                            <select name="betaalmethode" id="betaalmethode">
                                <option value="IDeal">IDeal</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn">Bevestigen</button></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="_token" value="{{ Session::token() }}"/></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</section>
@endsection
