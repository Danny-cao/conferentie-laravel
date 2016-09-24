@extends('layouts.master')

@section('content')


<section class="contact"> 

        <h1> Organisator Login </h1>    
        
        @if(count($errors) > 0)
            <section class="info-box fail">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </section>    
        @endif
        @if(Session::has('fail'))
            <section class="info-box fail">
                {{ Session::get('fail')}}
            </section>
        @endif    
        <form  method="post" action="{{ route('user.login') }}">
            <div class ="input-group">
                <label for="gebruikersnaam">
                    Gebruikersnaam: 
                </label>
                <input type="text" name="gebruikersnaam" id="gebruikersnaam" placeholder="Gebruikersnaam"/>
            </div>
            
              <div class ="input-group">
                <label for="wachtwoord">
                    Wachtwoord:
                </label>
                <input type="password" name="password" id="password" placeholder="Wachtwoord"/>
            </div>
            <button type="submit" >Log in</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
</section>


@endsection