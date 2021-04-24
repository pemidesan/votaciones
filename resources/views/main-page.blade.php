@extends('layout.main-layout')
@section('page-title','Bienvenidos a la página de votaciones')
@section('content-area')
    <h1>Bienvenidos a la página de votaciones</h1>
    <div>
        <ul>
            <li><strong>Vecinos</strong></li>
            <ul>
                <li>  
                    <div class="alert alert-success" role="alert">
                        <a href="{{route('vecinos.index')}}">Vecinos</a>
                    </div>                  
                </li>
                <li>
                    <div class="alert alert-success" role="alert">
                        <a href="{{route('vecinos.create')}}">Nuevo Vecino</a>
                    </div>      
                </li>           
                     
            </ul>
        </ul>
    </div>
@endsection