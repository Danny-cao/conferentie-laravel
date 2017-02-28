<header>
    <div class="col-sm-12 img-banner">
        <img src="http://conferentie-dannycao.c9users.io/src/banner.jpg"
    </div>
    <nav class="col-sm-12">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/agenda">Agenda</a></li>
            <li><a href="/contact">Contact</a></li>
            <form method="get" action="{{ route('search') }}" id="search">
                <li><input type="text" name="search" placeholder="Zoek conferentie"/></li>
                <li><button type="submit" class="btn">Search</button></li>
            </form>
        </ul>
        

    </nav>
    
</header>