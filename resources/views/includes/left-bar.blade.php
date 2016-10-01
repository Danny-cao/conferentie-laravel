<div class="left-bar">
    
    <ul>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('agenda') }}">Agenda</a></li>
            <li><a href="/reservering">Reserveren</a></li>
            <li><a href="/aanmelding">Aanmelden</a></li>
            <li><a href="/contact">Contact</a></li>
            
            @if(Auth::check())
            <li><a href="{{ route('user.logout') }}">Logout</a></li>
            @endif

            
    </ul>
    
</div>

