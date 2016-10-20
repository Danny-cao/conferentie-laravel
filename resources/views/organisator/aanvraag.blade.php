@extends('layouts.master')

@section('content')

<h1> Organisator Aanvragen</h1>


   
   
    <table class ="aanvragen">
    <form type="post">
         <tr>
            <th></th><th>onderwerp</th><th>omschrijving</th>
        </tr>
        @foreach($aanmeldingen as $aanmelding)
        <tr>
            <td><input type="checkbox" name="aanmelding" value="{{ $aanmelding->id }}"></td>
            <td>{{ $aanmelding->onderwerp }}</td>
            <td>{{ $aanmelding->omschrijving }}</td>
        </tr>
        @endforeach
        <td><input type="button" name="accepteren" value="accepteren"/></td> 
        <td><input type="button" name="verwerpen" value="verwerpen"/></td> 
    </form>
    </table>    


@endsection