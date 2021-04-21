@extends('layout.main-layout')
@section('page-title','Página de vecinos')
@section('content-area')
    <h1>Lista total de vecinos</h1>    
    <h2>Ficha de vecino</h2>
    <table>
        <tr><td>Id</td><td>{{$unVecino->id}}</td></tr>
        <tr><td>Nombre</td><td>{{$unVecino->nombre}}</td></tr>
        <tr><td>Primer Apellido</td><td>{{$unVecino->apellido1}}</td></tr>
        <tr><td>Segundo Apellido</td><td>{{$unVecino->apellido2}}</td></tr>
        <tr><td>Teléfono</td><td>{{$unVecino->telefono}}</td></tr>
        <tr><td>Mail</td><td>{{$unVecino->mail}}</td></tr>
        <tr><td>Fecha Creación</td><td>{{$unVecino->created_at}}</td></tr>
        <tr><td>Fecha Última Actualización</td><td>{{$unVecino->updated_at}}</td></tr>
    </table>
    @endsection
