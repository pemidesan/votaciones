@extends('layout.main-layout')
@section('page-title','Nuevo vecino')
@section('content-area')
    <h2>Nuevo artículo</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    @endif
    <form action="{{route('vecinos.store')}}" method="POST">
        @csrf
        <h3><legend>Alta de nuevo Vecino</legend></h3>
        <p>Nombre</p><input type="text" name="form_nombre_vecino" value="{{old('form_nombre_vecino')}}">
        <p>Primer Apellido</p><input type="text" name="form_apellido1_vecino" value="{{old('form_apellido1_vecino')}}">
        <p>Segundo Apellido</p><input type="text" name="form_apellido2_vecino" value="{{old('form_apellido2_vecino')}}">
        <p>Teléfono</p><input type="tel" name="form_telefono_vecino" value="{{old('form_telefono_vecino')}}">
        <p>Mail</p><input type="email" name="form_email_vecino" value="{{old('form_email_vecino')}}">        
        <br><br><br>
        <button type="submit">Crear Registro</button>        
        <button type="reset">Limpiar Formulario</button>
    </form>
    
@endsection