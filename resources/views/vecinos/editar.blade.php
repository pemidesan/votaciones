@extends('layout.main-layout')
@section('page-title','Editar '.$unVecino ->nombre.' '.$unVecino ->apellido1.' '.$unVecino ->apellido2)
@section('content-area')
    <h2>Editar Datos de Vecino</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    @endif
    <form action="{{route('vecinos.update',['vecino'=>$unVecino])}}" method="POST">
        @csrf        
        @method('PUT')
        <p>Nombre</p><input type="text" name="form_nombre_vecino" value="{{$unVecino ->nombre}}">
        <p>Primer Apellido</p><input type="text" name="form_apellido1_vecino" value="{{$unVecino ->apellido1}}">
        <p>Segundo Apellido</p><input type="text" name="form_apellido2_vecino" value="{{$unVecino ->apellido2}}">
        <p>Teléfono</p><input type="tel" name="form_telefono_vecino" value="{{$unVecino ->telefono}}">
        <p>Mail</p><input type="email" name="form_email_vecino" value="{{$unVecino ->mail}}">        
        <br><br><br>
        <button type="submit">Actualizar Registro</button>        
        <button type="reset">Limpiar Formulario</button>
    </form>
@endsection