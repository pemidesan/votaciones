@extends('layout.main-layout')
@section('page-title','Bienvenidos a la página de votaciones')
@section('content-area')
    <h1>Bienvenidos a la página de votaciones</h1>
    <div class="container-fluid">
        <ul>
            <li><strong>Vecinos</strong></li>
            <ul>
                <li>
                    <a href="{{route('vecinos.index')}}">Ver todos los vecinos</a>
                </li>
                <li>
                    <a href="{{route('vecinos.create')}}">Nuevo Vecino</a>
                </li>
            </ul>
        </ul>
    </div>
@endsection