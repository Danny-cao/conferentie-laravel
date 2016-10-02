<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ URL::secure('src/css/main.css') }}" />
        <script src="{{ URL::secure('src/jquery/jquery-3.1.1.min.js') }}"></script>
        @yield('styles')
        
     </head>
     
        @include('includes.header')
        
        @include('includes.left-bar')
    <body>
        
        <div class="main">
           
            @yield('content')
        </div>
        @include('includes.footer')
        
    </body>
</html>