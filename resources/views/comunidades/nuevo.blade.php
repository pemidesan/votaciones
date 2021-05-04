@extends('layout.main-layout')
@section('page-title','Nuevo vecino')
@section('content-area')
    <h2>Comunidades</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    @endif
    <form action="{{route('comunidades.store')}}" method="POST">
        @csrf
        <h3><legend>Alta de nueva Comunidad</legend></h3>
        <p>Dirección</p><input type="text" name="direccion" value="{{old('direccion')}}">
        <p>Alias</p><input type="text" name="alias" value="{{old('alias')}}">
        <p>Ciudad</p><input type="text" name="ciudad" value="{{old('ciudad')}}">
        <p>Provincia</p><input type="text" name="provincia" value="{{old('provincia')}}">        
        <br><br><br>
        <button type="submit">Crear Registro</button>        
        <button type="reset">Limpiar Formulario</button>
    </form>   
@endsection