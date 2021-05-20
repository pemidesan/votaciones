@extends('layout.main-layout')
@section('page-title','Asignar vivienda')
@section('content-area')
<h2>Asignar Vivienda a {{$nombreVecino}}</h2>
@if ($errors->any())
    @foreach ($errors->all() as $e)
        <li>{{$e}}</li>
    @endforeach
@endif
<form action="{{route('vecinosViviendasGrabar')}}" method="POST">
    @csrf       
    <p>Vecino</p><input type="text" disabled name="nombre" value="{{$nombreVecino}}">    
    <input type="hidden" name="id_vecino" value="{{$id_vecino}}">
    @livewire('App\Http\Livewire\SelectComunidadViviendas')
 
</select>
    <p>Fecha Inicio asignación</p><input type="date" name="fecha_ini" value="{{old('fecha_ini')}}">
    <p>Fecha Fin asignación</p><input type="date" name="fecha_fin" value="{{old('fecha_fin')}}">
    <br><br><br>
    <button type="submit">Crear Registro</button>        
    <button type="reset">Limpiar Formulario</button>
</form>   

@endsection