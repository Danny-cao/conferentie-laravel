@extends('layouts.master')
@section('content')

<script type="text/javascript">

    $(function(){
        /* ************************ Algemene functies ************************ */
        /* Verander functie voor change Values van totale prijzen */
        function veranderPrijs() {
            var sumMeals = 0;
            $('.priceMaaltijd').each(function(i, obj) {
                sumMeals += $(this).val()*1;
            });
            var sumTickets = 0;
            $('.price').each(function(i, obj) {
                sumTickets += $(this).val()*1;
            });
            document.getElementById("totaalTicket").value = sumTickets;
            document.getElementById("totaalMaaltijd").value = sumMeals;
            document.getElementById("totaalReservering").value = sumMeals + sumTickets;
        }
        /* ************************ Ticket ************************ */
        /* Add row ticket */
        $('.addticket').click(function(){
            var ticket = $('.ticket').html();
            var n = ($('.body_ticket tr').length-0)+1;
            
            var newTicketRow = '<tr><th class="no">'+ n +'</th>' +
                '<td><select name="ticket[]" class="ticket">'+ ticket +'</select></td>' + 
        		'<td><input type="text" name="price[]" class="price" value="45" readonly></td>' + 
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
            newTicketRow.find(".price").val(prijs);
            veranderPrijs();
            
        });
        
             /* ************************ Maaltijd ************************ */
        /* Add row maaltijd */
        $('.addmaaltijd').click(function(){
            var maaltijd = $('.maaltijd').html();
            var n = ($('.body_maaltijd tr').length-0)+1;
            var newTicketRow = '<tr><th class="no">'+ n +'</th>' +
            
        		'<td><select name="maaltijd[]" class="maaltijd" id="maaltijd">@foreach($maaltijden as $maaltijd)' + 
        		
        		'<option maaltijd-prijs="{{ $maaltijd->prijs }}" value="{{ $maaltijd->id }}">{{ $maaltijd->maaltijd_naam }}</option>@endforeach</select></td>' + 

                '<td>' +
        
                     '<select name="dag[]">' + 
                                '<option value="vrijdag">Vrijdag</option>' +
                                '<option value="zaterdag">Zaterdag</option>' +
                                '<option value="zondag">Zondag</option>' +
                            '</select>' +
                
                
                '</td>' +
                
                    
        		
            	'<td><input type="text" name="priceMaaltijd[]" class="priceMaaltijd" value="20" readonly></td>' + 
            
        		'<td><a href="#" class="btn btn-danger delete">verwijder</a></td></tr>';
            $('.body_maaltijd').append(newTicketRow);
            
            veranderPrijs();
        });
        
        /* Delete selected row maaltijd */
        $(".body_maaltijd").delegate(".delete", "click", function() {
            $(this).parent().parent().remove();
            
            veranderPrijs();
        });
        
        /* Change value depending on type Maaltijd */
        $('.body_maaltijd').delegate(".maaltijd", "change", function(e) {
            var newTicketRow = $(this).parent().parent();
            var prijs = newTicketRow.find(".maaltijd option:selected").attr("maaltijd-prijs");
            
            newTicketRow.find(".priceMaaltijd").val(prijs);
             
            var el = e.target;
        
            var new_el = $('#dag_template').clone();
            new_el.attr('id', '');
            new_el.css('display', 'block');

            if(el.value == '2'){
                new_el.find('option[value=vrijdag]').remove();
            }
            
            $(el.parentElement).next().html(new_el);
            
            veranderPrijs();
        });
        
        


        
    });
    
</script>

<section class="reservering"> 
    <h1> Tickets Reserveren </h1>
    <div class="table table-bordered table-hover">
        <table>
            <tr>
                <th>Ticket</th>
                <th>Prijs</th>
                <th>aantal beschikbaar</th>
            </tr>    
            @foreach($tickets as $ticket)
            @if($ticket->id <= 5)
            <tr>
             <td>{{$ticket->ticket_naam }}</td>
             <td>{{$ticket->prijs }}</td>
            @if($ticket->id <= 3)
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
        
        <form  method="post" action='{{ route('postreservering') }}' id='reserveren'>
            
            <!-- ******* Ticket ******* -->
            <div class="input-group">
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
                                        <option ticket-prijs="{{ $ticket->prijs }}" value="{{ $ticket->id }}">{{ $ticket->ticket_naam }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="price[]" class="price" value="45" readonly>
                            </td>
                        </tr>
                        <button type="button" class="btn addticket" value="+">Ticket Toevoegen</button><br>
                    </tbody>
                </table>
            </div>
                 <!-- ******* Maaltijd ******* -->
            <div class="input-group">
                <button type="button" class="btn addmaaltijd" value="+">Maaltijd toevoegen</button><br>
                <table>
                    <thead>
                        <tr>
                            <th>Nr.</th>
                            <th>Soort maaltijd</th>
                            <th>Dag</th>
                            <th>Prijs</th>
                        </tr>
                    </thead>
                    <tbody class="body_maaltijd">
                        <label for="maaltijd">
                            Kies een maaltijd: 
                            
                            <select name="dag[]" id="dag_template" style="display:none">
                                <option value="vrijdag">Vrijdag</option>
                                <option value="zaterdag">Zaterdag</option>
                                <option value="zondag">Zondag</option>
                            </select>
                            
                        </label><br>
                            </tbody>
                </table>
            </div>
            
            <div class="input-group">
                <center>
                    <table>
                        <tr>
                           <td><label for="totaal">Totaal ticket: </label></td>
                            <td><input type="text" id="totaalTicket" name="totaalTicket" class="totaalTicket" value="45" readonly></td>
                        </tr>
                        <tr>
                           <td><label for="totaal">Totaal maaltijd: </label></td>
                            <td><input type="text" id="totaalMaaltijd" name="totaalMaaltijd" class="totaalMaaltijd" value="0" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="totaal">Totaal prijs: </label></td>
                            <td><input type="text" id="totaalReservering" name="totaalReservering" class="totaalReservering" value="45" readonly></td>
                        </tr>
                    </table>
                </center>
            </div>
            
            
            <h3>Persoonlijke gegevens: </h3>
            <div class="input-group">
                
                    <tr>
                        <td><label for="naam">Voornaam: </label></td>
                        <td><input type="text" name="naam" id="naam" placeholder="naam"/></td>
                    </tr>
            </div>
            
            <div class="input-group">
                    <tr>
                        <td><label for="tussenvoegsel">Tussenvoegsel: </label></td>
                        <td><input type="text" name="tussenvoegsel" id="tussenvoegsel" placeholder="tussenvoegsel"/></td>
                    </tr>
            </div>        
                    <tr>
                        <td><label for="achternaam">Achternaam: </label></td>
                        <td><input type="text" name="achternaam" id="achternaam" placeholder="achternaam"/></td>
                    </tr>
            </div>        
            <div class="input-group">           
                    <tr>
                        <td><label for="email">Email: </label></td>
                        <td><input type="text" name="email" id="email" placeholder="Danny@danny.nl"/></td>
                    </tr>
            </div>        
            <div class="input-group">           
                    <tr>
                        <td><label for="telnummer">Telnummer: </label></td>
                        <td><input type="text" name="telnummer" id="telnummer" placeholder="telnummer"/></td>
                    </tr>
            </div>        
            <div class="input-group">           
                    <tr>
                        <td><label for="adres">Adres: </label></td>
                        <td><input type="text" name="adres" id="adres" placeholder="adres"/></td>
                    </tr>
            </div>        
            <div class="input-group">           
                    <tr>
                        <td><label for="woonplaats">Woonplaats: </label></td>
                        <td><input type="text" name="woonplaats" id="woonplaats" placeholder="woonplaats"/></td>
                    </tr>
            </div>        
            <div class="input-group">          
                    <tr>
                        <td><label for="betaalmethode">Betaalmethode: </label></td>
                        <td>
                            <select name="betaalmethode" id="betaalmethode">
                                <option value="IDeal">IDeal</option>
                            </select>
                        </td>
                    </tr>
            </div>           
            <div class="input-group">       
                    <tr>
                        <td><button type="submit" class="btn">Bevestigen</button></td>
                        <td></td>
                    </tr>
            </div>        
            <div class="input-group">        
                    <tr>
                        <td><input type="hidden" name="_token" value="{{ Session::token() }}"/></td>
                        <td></td>
                    </tr>
            </div>
        </form>
    </div>
</section>
@endsection
