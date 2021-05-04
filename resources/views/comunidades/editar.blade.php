@extends('layout.main-layout')
@section('page-title','Editar '.$unaComunidad ->direccion)
@section('content-area')
    <h2>Editar Comunidad</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    @endif
    <form action="{{route('comunidades.update',['comunidad'=>$unaComunidad])}}" method="POST">
        @csrf        
        @method('PUT')
        <p>Direccion</p><input type="text" name="form_direccion_comunidad" value="{{$unaComunidad ->direccion}}">
        <p>Alias</p><input type="text" name="form_alias_comunidad" value="{{$unaComunidad ->alias}}">
        <p>Ciudad</p><input type="text" name="form_ciudad_comunidad" value="{{$unaComunidad ->ciudad}}">
        <p>Provincia</p><input type="text" name="form_provincia_comunidad" value="{{$unaComunidad ->provincia}}">        
        <br><br><br>
        <button type="submit">Actualizar Registro</button>        
        <button type="reset">Limpiar Formulario</button>
    </form> 
@endsection