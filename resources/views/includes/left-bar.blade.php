<div class="pre-scrollable col-sm-2 left-bar">
    <ul class="col-sm-12">
            <li><a class="col-sm-12" href="/">Home</a></li>
            <li><a class="col-sm-12" href="{{ route('agenda') }}">Agenda</a></li>
            <li><a class="col-sm-12" href="{{ route('reservering') }}">Ticket(s) reserveren</a></li>
            <li><a class="col-sm-12" href="{{ route('Aanmelding') }}">Aanmelden</a></li>
            <li><a class="col-sm-12" href="{{ route('contact') }}">Contact</a></li>

            @if(!Auth::check())
                <li><a class="col-sm-12" href="{{ route('user.login') }}">Login</a></li>
            @endif

            @if(Auth::check())
                <li><a class="col-sm-12" href="{{ route('user.logout') }}">Logout</a></li>
            @endif
    </ul>
</div>

