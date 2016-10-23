@extends('layouts.master')
@section('content')

<script type="text/javascript">

    $(function(){
        /* ************************ Algemene functies ************************ */
        /* Verander functie voor change Values van totale prijzen */
        function changeValues() {
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
            
            changeValues();
        });
    
        /* Delete selected row ticket */
        $(".body_ticket").delegate(".delete", "click", function() {
            $(this).parent().parent().remove();
            
            changeValues();
        });
        
        /* Change value depending on type Ticket */
        $('.body_ticket').delegate(".ticket", "change", function() {
            var newTicketRow = $(this).parent().parent();
            var prijs = newTicketRow.find(".ticket option:selected").attr("ticket-prijs");
            newTicketRow.find(".price").val(prijs);
            changeValues();
        });
        
        
    });
    
</script>

<section class="reservering"> 
    <h1> Tickets Reserveren </h1>
    <div class="col-md-6">
        <table>
            <tr><th>Ticket</th>         <th>Prijs in €</th> <th>Beschikbaar</th></tr>
            <tr><td>Vrijdag</td>        <td>€45</td>        <td>250</td></tr>
            <tr><td>Zaterdag</td>       <td>€60</td>        <td>250</td></tr>
            <tr><td>Zondag</td>         <td>€30</td>        <td>250</td></tr>
            <tr><td>Passe-partout</td>  <td>€100</td></tr>
            <tr><td>weekend</td>        <td>€80</td></tr>
        </table>
    </div>
    <div class="col-md-6">
        <table>
            <tr>
                <th>Maaltijd</th>
                <th>Prijs</th>
                <th>Dagen</th>
                <th>Tijdstip</th>
            </tr>
            <tr>
                <td>Lunch</td>
                <td>€20</td>
                <td>Alle dagen</td>
                <td>12:00 - 13:30</td>
            </tr>
            <tr>
                <td>Diner</td>
                <td>€30</td>
                <td>Weekend</td>
                <td>17:30 - 20:00</td>
            </tr>
        </table>
    </div>
    <br>
    <div class="col-md-12">
        @include('includes.info-box')
        
        <form  method="post" action='{{ route('postreservering') }}' id='reserveren'>
            
            <!-- ******* Ticket ******* -->
            <div class="col-md-6">
                <button type="button" class="btn addticket" value="+">Ticket Toevoegen</button><br>
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
                    </tbody>
                </table>
            </div>
            
            <!-- ******* Maaltijd ******* -->

            
                  <div class="col-sm-12">
                        <div class="form-group">
                            <input type="checkbox" class="checkbox-inline" name="order-meal" id="order-meal" {{ old('order-meal') ? 'checked' : '' }}>
                            <label for="order-meal">Maaltijd bestellen</label>
                        </div>
                    </div>

                    <table class="table disabled" id="meal-table">
                        @foreach($maaltijden as $maaltijd_type)
                            <tr class="price-block">
                                <td><label for="maaltijd-{{ $maaltijd_type->id }}">{{ $maaltijd_type->maaltijd_naam }}</label>
                                </td>
                                <td>&euro;&nbsp;<span class="price">{{ $maaltijd_type->prijs }}</span></td>
                                <td>
                                    <input type="number" name="maaltijd-{{ $maaltijd_type->id }}" id="maaltijd-{{ $maaltijd_type->id }}" class="form-control" placeholder="Aantal"
                                           value="{{ old('maaltijd-' . $maaltijd_type->id) }}">
                                </td>
                            </tr>
                        @endforeach
                    </table>
            
            
            <div class ="totaaldiv col-md-12">
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
                            <td><label for="totaal">Totaal reservering: </label></td>
                            <td><input type="text" id="totaalReservering" name="totaalReservering" class="totaalReservering" value="45" readonly></td>
                        </tr>
                    </table>
                </center>
            </div>
            
            <p>Totale prijs: &euro;&nbsp;<span id="total-price">0</span></p>
            
            <div class ="input-group col-md-12">
                <table>
                    <tr>
                        <td><label for="naam">Voornaam: </label></td>
                        <td><input type="text" name="naam" id="naam" placeholder="je naam"/></td>
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
                        <td><input type="text" name="email" id="email" placeholder="email"/></td>
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
                                <option value="PayPal">PayPal</option>
                                <option value="Creditcard">Creditcard</option>
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


@section('scripts')
    <script type="text/javascript">
        var order_meal = $("input#order-meal");

        if (order_meal.attr('checked')) {
            $('#meal-table').removeClass('disabled');
        }

        order_meal.change(function () {
            if (this.checked) {
                $('#meal-table').removeClass('disabled');
            } else {
                $('#meal-table').addClass('disabled');
            }
        });

        var total_price = $('#total-price');

        var calculate_total_price = function () {
            var values = $('form').find('input[type=number]');

            var total = 0;
            values.each(function (i, e) {
                var count = parseInt(e.value);
                if (count) {
                    var value = $(e).closest('.price-block').find('.price').text();
                    total += count * parseFloat(value);
                }
            });

            total_price.text(total);
        };

        calculate_total_price();

        $('form').on('change', 'input[type=number]', calculate_total_price);
    </script>
@endsection