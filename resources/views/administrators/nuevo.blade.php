@extends('layout.main-layout')
@section('page-title','Nuevo Administrador')
@section('content-area')
    <h2>Vecinos</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    @endif
    <form action="{{route('administrators.store')}}" method="POST">
        @csrf
        <h3><legend>Alta de nuevo Administrador</legend></h3>
        <p>Nombre</p><input type="text" name="nombre" value="{{old('nombre')}}">
        <p>Primer Apellido</p><input type="text" name="apellido1" value="{{old('apellido1')}}">
        <p>Segundo Apellido</p><input type="text" name="apellido2" value="{{old('apellido2')}}">
        <p>Teléfono</p><input type="tel" name="telefono" value="{{old('telefono')}}">
        <p>Mail</p><input type="email" name="mail" value="{{old('mail')}}">        
        <br><br><br>
        <button type="submit">Crear Registro</button>        
        <button type="reset">Limpiar Formulario</button>
    </form>   
@endsection