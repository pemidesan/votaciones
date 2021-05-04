@extends('layout.main-layout')
@section('page-title','Administradores')
@section('content-area')
    <h1>Vecinos</h1>    
    <h2>Ficha de Administrador</h2>
    <table>
        <tr><td>Id</td><td>{{$unAdministrator->id}}</td></tr>
        <tr><td>Nombre</td><td>{{$unAdministrator->nombre}}</td></tr>
        <tr><td>Primer Apellido</td><td>{{$unAdministrator->apellido1}}</td></tr>
        <tr><td>Segundo Apellido</td><td>{{$unAdministrator->apellido2}}</td></tr>
        <tr><td>Teléfono</td><td>{{$unAdministrator->telefono}}</td></tr>        
        <tr><td>Mail</td><td>{{$unAdministrator->mail}}</td></tr>        
        <tr><td>Fecha Creación</td><td>{{$unAdministrator->created_at}}</td></tr>
        <tr><td>Fecha Última Actualización</td><td>{{$unAdministrator->updated_at}}</td></tr>
    </table>   
    @endsection
