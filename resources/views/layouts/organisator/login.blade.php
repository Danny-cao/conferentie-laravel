@extends('layouts.master')

@section('content')


<section class="contact"> 

        <h1> Organisator Login </h1>    
        
        <form  method="post" action="">
            <div class ="input-group">
                <label for="user">
                    Gebruikersnaam: 
                </label>
                <input type="text" name="user" id="user" placeholder="Gebruikersnaam"/>
            </div>
            
              <div class ="input-group">
                <label for="email">
                    Wachtwoord:
                </label>
                <input type="password" name="wachtwoord" id="wachtwoord" placeholder="Wachtwoord"/>
            </div>
            <button type="submit" class="btn">Log in</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
        
</section>


@endsection