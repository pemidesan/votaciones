@extends('layout.main-layout')
@section('page-title','Nuevo vecino')
@section('content-area')
    <h1>{{$administrator->nombre." ".$administrator->apellido1." ".$administrator->apellido2." ".$accion}} correctamente</h1>    
@endsection
