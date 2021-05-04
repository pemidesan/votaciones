@extends('layout.main-layout')
@section('page-title','Editar '.$unAdministrator ->nombre.' '.$unAdministrator ->apellido1.' '.$unAdministrator ->apellido2)
@section('content-area')
    <h2>Editar Datos de Administrador</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    @endif
    <form action="{{route('administrators.update',['administrator'=>$unAdministrator])}}" method="POST">
        @csrf        
        @method('PUT')
        <p>Nombre</p><input type="text" name="form_nombre_administrator" value="{{$unAdministrator ->nombre}}">
        <p>Primer Apellido</p><input type="text" name="form_apellido1_administrator" value="{{$unAdministrator ->apellido1}}">
        <p>Segundo Apellido</p><input type="text" name="form_apellido2_administrator" value="{{$unAdministrator ->apellido2}}">
        <p>Teléfono</p><input type="tel" name="form_telefono_administrator" value="{{$unAdministrator ->telefono}}">
        <p>Mail</p><input type="email" name="form_email_administrator" value="{{$unAdministrator ->mail}}">        
        <br><br><br>
        <button type="submit">Actualizar Registro</button>        
        <button type="reset">Limpiar Formulario</button>
    </form> 
@endsection