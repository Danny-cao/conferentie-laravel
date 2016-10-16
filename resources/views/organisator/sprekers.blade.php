@extends('layouts.master')

@section('content')

<h1> Organisator sprekers</h1>

@foreach($sprekers as $spreker)
@foreach($aanmeldingen as $aanmelding)
@foreach($slots as $slot)
@if( $spreker->id == $aanmelding->idUser && $aanmelding->idSlot == $slot->id)

    {{ $spreker->naam }}
    {{ $aanmelding->onderwerp}}
    {{ $slot->status }}
@endif
@endforeach
@endforeach    
@endforeach



@endsection