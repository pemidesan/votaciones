@extends('layout.main-layout')
@section('page-title','Comunidades')
@section('content-area')
    <h1>Comunidades</h1>    
    <h2>Ficha de Comunidad</h2>
    <table>
        <tr><td>Id</td><td>{{$unaComunidad->id}}</td></tr>
        <tr><td>Dirección</td><td>{{$unaComunidad->direccion}}</td></tr>
        <tr><td>Alias</td><td>{{$unaComunidad->alias}}</td></tr>
        <tr><td>Ciudad</td><td>{{$unaComunidad->ciudad}}</td></tr>
        <tr><td>Provincia</td><td>{{$unaComunidad->provincia}}</td></tr>        
        <tr><td>Fecha Creación</td><td>{{$unaComunidad->created_at}}</td></tr>
        <tr><td>Fecha Última Actualización</td><td>{{$unaComunidad->updated_at}}</td></tr>
    </table>   
    @endsection
