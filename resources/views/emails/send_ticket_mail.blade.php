<h2> Uw Persoonlijke gegevens </h2>


<ul>
    <li>Naam:{{ $user['naam'] }} </li> 
    <li>tussenvoegsel:{{ $user['tussenvoegsel'] }}</li>
    <li>Achernaam: {{ $user['achternaam'] }}</li> 
    <li>Adres: {{ $user['adres'] }}</li>
    <li>Woonplaats: {{ $user['woonplaats'] }}</li>
</ul>


<h2> Uw reservering gegevens </h2>

@foreach($reservering_ticket as $reservering)

<ul>
<li>Ticketid: {{ $reservering->idTicket }} </li>
<li>maaltijd: {{ $reservering->idMaaltijd }} </li>
</ul>
@endforeach



<p> Uw ticket zit in de bijlage</p>

