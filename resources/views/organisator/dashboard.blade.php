@extends('layouts.master')

@section('content')
<section class="dashboard">

<h1> Organisator Dashboard</h1>

        <ul>
    	    <li><a href="{{ route('user.conferentie') }}">Conferentie's</a></li>
			<li><a href="{{ route('user.aanvraag') }}">Alle aanmeldingen</a></li>    		
			<li><a href="{{ route('user.sprekers') }}">Alle geaccepteerde sprekers</a></li>
    	</ul>
<section>
@endsection