@extends('layouts.master')

@section('content')

<script type="text/javascript">

function totalamount()
    {
        var t=0;
        $('.amount').each(function(i,e)
       {
           var amt = $(this).val()-0;
           t += amt;
       });
        $('.total').html(t);
    }

    $(function(){
        $('.add').click(function(){
            var ticket = $('.ticket').html();
            var maaltijd = $('.maaltijd').html();
            var n = ($('.body tr').length-0)+1;
            
            var newTicketRow = '<tr><th class="no">'+n+'</th>' +
                '<td><select name="ticket[]" class="ticket">'+ticket+'</select></td>' + 
    			'<td><input type="text" name="price[]" class="price form-control"></td>' + 
    			'<td><select name="maaltijd[]" class="maaltijd">'+maaltijd+'</select></td>' + 
	        	'<td><input type="text" name="priceMaaltijd[]" class="priceMaaltijd form-control"></td>' + 
    			'<td><input type="text" name="amount[]" class="amount form-control"></td>' + 
    			'<td><a href="#" class="btn btn-danger delete">verwijder</a></td></tr>';
    	$('.body').append(newTicketRow);		
        });
        
        $('.body').delegate('.delete','click',function(){
            $(this).parent().parent().remove();
            totalamount();
        });

        
        $('.body').delegate('.ticket','change',function(){
            var newTicketRow = $(this).parent().parent();
            var prijs = newTicketRow.find('.ticket option:selected').attr('ticket-prijs');
            newTicketRow.find('.price').val(prijs);
            
 		    var maaltijd = newTicketRow.find('.priceMaaltijd').val();
 		    var price = newTicketRow.find('.price').val();

 		    var total = (price * 1) + (maaltijd * 1);
 		    newTicketRow.find('.amount').val(total *1);
 		    totalamount();
            
        });
        
                
        $('.body').delegate('.maaltijd','change',function(){
            var newTicketRow = $(this).parent().parent();
            var priceMaaltijd = newTicketRow.find('.maaltijd option:selected').attr('maaltijd-prijs');
            newTicketRow.find('.priceMaaltijd').val(priceMaaltijd);
            
            var maaltijd = newTicketRow.find('.priceMaaltijd').val();
 		    var price = newTicketRow.find('.price').val();

 		    var total = (price * 1) + (maaltijd * 1);
 		    newTicketRow.find('.amount').val(total *1);
 		    totalamount();
        });
        

        $('.body').delegate('.amount','keyup',function(){
 		var newTicketRow = $(this).parent().parent();
 		var maaltijd = newTicketRow.find('.priceMaaltijd').val();
 		var price = newTicketRow.find('.price').val();

 		var total = (price * 1) + (maaltijd * 1)
 		newTicketRow.find('.amount').val(total *1);
 		totalamount();
        });
        
        
        
    });
</script>

<section class="reservering"> 

        <h1> Ticket Reserveren </h1>    
        @include('includes.info-box')
        
        
              <table style="width:80%">
             <tr>
                    <th>Beschikbare tickets:</th>
                    <th>Prijs</th>
                    <th>beschikbare plekken</th>
                </tr>  
                @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->soort }}</td>    
                    <td>€{{ $ticket->prijs }}</td>
                    <td>{{ $ticket->beschikbaar }}</td>
                </tr>
                @endforeach
        </table>
        
        
         <form action="{{ route('saveorder') }}" method="post">
    
    <table class="table table-bordered table-hover">
    	<thead>
    	    <th>N</th>
			<th>Ticket:</th>    		
			<th>Prijs ticket:</th>
			<th>Maaltijd:</th>
			<th>Prijs Maaltijd:</th>
			<th>Totaal:</th>
			<th><input type="button" class="btn btn-primary add" value="Ticket toevoegen"></th>
    	</thead>
    	<tbody class="body">
    		<tr>
    		    
    		    <th class="no">1</th>
    			<td>
    			<select name="ticket[]" class="ticket">
    			    <option selected="selected">Kies een Ticket</option>
    			    @foreach($tickets as $ticket)
    			        <option ticket-prijs="{{ $ticket->prijs }}" value="{{ $ticket->id }}">{{ $ticket->soort }}</option>
    			    @endforeach
    			    
    			</select>    
    		
    			
    			
    			
    			</td>
    			<td><input type="text" name="price[]" class="price form-control" readonly></td>
    			<td>
    			<select name="maaltijd[]" class="maaltijd">
    			
    			<option selected="selected">Geen</option>
			    @foreach($maaltijds as $maaltijd)
    			        <option maaltijd-prijs="{{ $maaltijd->prijs }}" value="{{ $maaltijd->id }}">{{ $maaltijd->soortmaaltijd }}</option>
    			@endforeach
    			
    			    
    			</select>    				
    			</td>
	        	<td><input type="text" name="priceMaaltijd[]" class="priceMaaltijd form-control" readonly></td>
    			<td><input type="text" name="amount[]" class="amount form-control" readonly></td>
    			
    		</tr>
    	</tbody>
    	<tfoot>
                <th>Totale prijs:<b class="total">0</b></th>    	
    	</tfoot>    
    	
    </table>
    
    
    
    <table class="table">
    
    	  <div class ="input-group">
                <label for="naam">
                    Voornaam: 
                </label>
                <input type="text" name="naam" id="naam" placeholder="je naam" value="{{ Request::old('naam') }}"/>
            </div>
            
               <div class ="input-group">
                <label for="tussenvoegsel">
                    Tussenvoegsel: 
                </label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel" />
            </div>
            
            <div class ="input-group">
                <label for="achternaam">
                    achternaam: 
                </label>
                <input type="text" name="achternaam" id="achternaam" value="{{ Request::old('achternaam') }}"/>
            </div>
            
            <div class ="input-group">
                <label for="email">
                    email: 
                </label>
                <input type="text" name="email" id="email" value="{{ Request::old('email') }}"/>
            </div>
            
            <div class ="input-group">
                <label for="telnummer">
                    telnummer: 
                </label>
                <input type="text" name="telnummer" id="telnummer"/>
            </div>
            
            <div class ="input-group">
                <label for="adres">
                    adres: 
                </label>
                <input type="text" name="adres" id="adres"/>
            </div>
            
            <div class ="input-group">
                <label for="woonplaats">
                    woonplaats: 
                </label>
                <input type="text" name="woonplaats" id="woonplaats"/>
            </div>
            
            
            <div class ="input-group">
                <label for="betaalmethode">
                    Betaalmethode: 
                </label>
                <select name="betaalmethode" id="betaalmethode">
                  <option value="IDeal">IDeal</option>
                  <option value="Creditcard">Creditcard</option>
                </select>
            </div>
    	
    	
    </table>
    <input type="hidden" name="_token" value="{{ Session::token() }}"/>
    <input type="submit" value="reserveren" name="submit" class="btn btn-primary">
    </form>
       
</section>


@endsection