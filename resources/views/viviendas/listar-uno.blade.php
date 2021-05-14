@extends('layout.main-layout')
@section('page-title','Vecinos')
@section('content-area')
    <h1>Vecinos</h1>    
    <h2>Ficha de Vecino</h2>
    <table>
        <tr><td>Direccion</td><td>{{$direccion}}</td></tr>
        <tr><td>Número</td><td>{{$vivienda->numero}}</td></tr>
        <tr><td>Piso</td><td>{{$vivienda->piso}}</td></tr>
        <tr><td>Puerta</td><td>{{$vivienda->puerta}}</td></tr>
        <tr><td>Escalera</td><td>{{$vivienda->escalera}}</td></tr>        
        <tr><td>Ratio</td><td>{{$vivienda->ratio}}</td></tr>        
        <tr><td>Fecha Creación</td><td>{{$vivienda->created_at}}</td></tr>
        <tr><td>Fecha Última Actualización</td><td>{{$vivienda->updated_at}}</td></tr>
    </table>   
    @endsection
