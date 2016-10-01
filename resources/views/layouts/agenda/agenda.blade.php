@extends('layouts.master')

@section('content')

<h1>  Test agenda </h1>

         <form>
             
             
             
    @foreach ($users as $user)
    <td>
         <tr>{{ $user->naam }}</tr>
     <input type="radio" name="{{ $user->naam }}" id="ticket" value="{{ $user->naam }}">{{$user->naam}}<br>
             </td>    
             @endforeach
             
         <input type="text" >
         
             
             </form>
 



@endsection