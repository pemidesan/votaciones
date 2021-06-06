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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <!--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">-->
        <title>@yield('page-title')</title>
        @livewireStyles
        @livewireScripts
    </head>
    <body>        
        <div class="container">
            <h1>VOTACIONES. V.1.0</h1>
            @yield('content-area')
            <br><br><a href="{{url('/')}}">Volver a Página principal</a>
        </div>
        
    </body> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        window.addEventListener('fomulario-ver', event=>{
            $('#form').modal('show');
        })
    </script>
    
    <script>
        window.addEventListener('formulario-ocultar',event=>{
            $('#form').modal('hide');
        })
    </script>
</html>