@extends('layout.main-layout')
@section('page-title','Bienvenidos a la página de votaciones')
@section('content-area')
    <h1>Bienvenidos a la página de votaciones</h1>
    <div>
        <ul>
            <li>  
                    <div class="alert alert-success" role="alert">
                        <a href="{{route('vecinos.index')}}">Gestión de Vecinos</a>
                    </div>                  
            </li>
        </ul>
    </div>
    <div>
        <ul>
            <li>  
                    <div class="alert alert-success" role="alert">
                        <a href="{{route('administrators.index')}}">Gestión de Administradores</a>
                    </div>                  
            </li>
        </ul>
    </div>
    <div>
        <ul>
            <li>  
                    <div class="alert alert-success" role="alert">
                        <a href="{{route('comunidades.index')}}">Gestión de Comunidades</a>
                    </div>                  
            </li>
        </ul>
    </div>
@endsection