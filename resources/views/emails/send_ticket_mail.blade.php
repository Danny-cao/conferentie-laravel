<h2> Uw Persoonlijke gegevens </h2>


<ul>
    <li>Naam:{{ $user['naam'] }} </li> 
    <li>tussenvoegsel:{{ $user['tussenvoegsel'] }}</li>
    <li>Achernaam: {{ $user['achternaam'] }}</li> 
    <li>Adres: {{ $user['adres'] }}</li>
    <li>Woonplaats: {{ $user['woonplaats'] }}</li>
</ul>


<h2> Uw reservering gegevens </h2>



<ul>
<li>User: {{ $reservering_ticket['user'] }} </li>
<li>Betaalmethode: {{ $reservering_ticket['betaalmethode'] }} </li>
</ul>



<p> Uw ticket zit in de bijlage</p>

