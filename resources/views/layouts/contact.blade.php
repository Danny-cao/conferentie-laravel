@extends('layouts.master')

@section('content')


<section class="contact"> 

        <div class="img">
            
         </div>

        <h1> Contact </h1>    
        
        <form  method="post" action="">
            <div class ="input-group">
                <label for="user">
                    Je Naam: 
                </label>
                <input type="text" name="user" id="user" placeholder="je naam"/>
            </div>
            
              <div class ="input-group">
                <label for="email">
                    Your Email
                </label>
                <input type="text" name="email" id="email" placeholder="your email"/>
            </div>
            
                  <div class ="input-group">
                <label for="bericht">
                    Je bericht
                </label>
                <textarea name="bericht" id="bericht" rows="5" placeholder="Bericht"> </textarea>
            </div>
            <button type="submit" class="btn">Berichtje versturen</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
        
        
        <ul>
            <li>ICT-OPEN</li>
            <li>Teststraat 6</li>
            <li>2345BH Woerden</li>
            <li>Email: Info@ict-open.nl</li>
            <li>Tel: 0348-555555</li>
        </ul>
</section>


@endsection