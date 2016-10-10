<h2> Uw Persoonlijke gegevens </h2>


<ul>
    <li>Naam:{{ $user['naam'] }} </li> 
    <li>tussenvoegsel:</li>
    <li>Achernaam: </li> 
    <li>Adres: </li>
    <li>Woonplaats: </li>
</ul>

@foreach($reservering_ticket as $reservering)
{{ $reservering->idTicket }}
@endforeach



<h2> Uw reservering gegevens </h2>
<ul>
    <li>Ticket: </li> 
    <li>Maaltijd:</li>
    <li>Dag: </li> 
</ul>

{!! QrCode::size(100)->generate('test123') !!}

<p> Uw ticket zit in de bijlage</p>

