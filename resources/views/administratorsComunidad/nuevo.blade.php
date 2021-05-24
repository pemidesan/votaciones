@extends('layout.main-layout')
@section('page-title','Nueva Comunidad')
@section('content-area')
    <h2>Vecinos</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    @endif
    <form action="{{route('administradorComunidadGrabar')}}" method="POST">
        @csrf
        <h3><legend>Asignar Comunidad</legend></h3>
        <input type="hidden" name="administrator_id" value="{{$nombreAdministrator->id}}">
        <p>Nombre</p><input type="text" name="nombreAdministrador" disabled
           value="{{$nombreAdministrator->nombre.' '.$nombreAdministrator->apellido1.' '.$nombreAdministrator->apellido2}}">              
        <select name="comunidad_id">
            @foreach ($listaComunidades as $lc)
                <option value="{{$lc->id}}">{{$lc->id." ".$lc->direccion}}</option>                
            @endforeach
        </select>     
        <br><br><br>
        <button type="submit">Crear Registro</button>        
        <button type="reset">Limpiar Formulario</button>
    </form>   
@endsection