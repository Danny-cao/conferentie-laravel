<div class="footer">
    @if(Auth::check())
        <li><a href="/organisator/dashboard">Organisator</a></li>
    @endif
    
    @if(!Auth::check())
        <li><a href="/organisator/login">Organisator</a></li>
    @endif
</div>