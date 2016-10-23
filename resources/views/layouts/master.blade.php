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
            
                    <!-- Scripts -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="/bower_components/moment/moment.js"></script>
<script src="/bower_components/moment/locale/nl.js"></script>
<script src="/bower_components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>

@yield('scripts')
        </div>
        @include('includes.footer')
        
    </body>
</html>