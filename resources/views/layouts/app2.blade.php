<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Queueing System</title>

    <!-- Fonts
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    -->
    <!-- Styles -->
    {!! Html::style('\css\bootstrap.css') !!}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">


    @yield('content')

    <!-- JavaScripts -->
    {!! Html::script('/js/jq.js') !!}
    {!! Html::script('/js/bootstrap.js') !!}
    {!! Html::script('/js/test.js') !!}
    @yield('content1')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
