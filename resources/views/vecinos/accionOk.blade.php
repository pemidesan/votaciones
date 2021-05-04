@extends('layout.main-layout')
@section('page-title','Nuevo vecino')
@section('content-area')
    <h1>{{$vecino->nombre." ".$vecino->apellido1." ".$vecino->apellido2." ".$accion}} correctamente</h1>    
@endsection
