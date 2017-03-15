<!DOCTYPE html>
<html>
    <head>
        <title>Searchable Tables</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/css/select2-bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
    </head>
    <body>
        @include('partials.nav')

        <div class="container">
            @yield('content')    
        </div>

        <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/momentjs/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
        <script type="text/javascript">
            $('select').select2();
        </script>
    </body>
</html>
