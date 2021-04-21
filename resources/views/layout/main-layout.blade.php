<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="UTF-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/app.css') }}">
        <link href="{{asset('css/estilo.css')}}" rel="stylesheet">
        <title>@yield('page-title')</title>
    </head>
    <body>        
        <div>
            <h1>VOTACIONES. Pedro Miguel Deseado Sandonís</h1>
            @yield('content-area')
        </div>
    </body> 
</html>