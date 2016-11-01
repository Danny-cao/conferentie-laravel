<header>
    <div class="img-banner">
        <img src="http://conferentie-dannycao.c9users.io/src/banner.jpg"
    </div>
    <nav>
        <ul>
            <form method="get" action="{{ route('search') }}" id="search">
                <li><button type="submit" class="btn">Search</button></li>
                <li><input type="text" name="search" placeholder="Zoek conferentie"/></li>
            </form>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/agenda">Agenda</a></li>
            <li><a href="/">Home</a></li>
        </ul>
        

    </nav>
    
</header>