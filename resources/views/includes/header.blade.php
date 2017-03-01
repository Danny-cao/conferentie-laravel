<header>
    <div class="col-sm-12 img-banner">
        <img src="{{ URL::secure('src/banner.jpg') }}">
    </div>
    <nav class="col-sm-12">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/agenda">Agenda</a></li>
            <li><a href="/contact">Contact</a></li>
            <form method="get" action="{{ route('search') }}" id="search">
                <li><input type="text" name="search" placeholder="Zoek conferentie"/></li>
                <li><button type="submit" class="btn">Search</button></li>
                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
            </form>
        </ul>
    </nav>
</header>