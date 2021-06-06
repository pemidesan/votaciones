@extends('layout.main-layout')
@section('page-title','Editar vivienda')
@section('content-area')
    <h2>Editar vivienda de comunidad: {{$nombreComunidad}}</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    @endif
    <form action="{{route('vivienda.update',['vivienda'=>$vivienda])}}" method="POST">
        @csrf        
        @method('PUT')
        <p>Número</p><input type="text" name="form_numero" value="{{$vivienda->numero}}">
        <p>Piso</p><input type="text" name="form_piso" value="{{$vivienda->piso}}">
        <p>Puerta</p><input type="text" name="form_puerta" value="{{$vivienda->puerta}}">        
        <p>Escalera</p><input type="text" name="form_escalera" value="{{$vivienda->escalera}}">  
        <p>Ratio</p><input type="text" name="form_ratio" value="{{$vivienda->ratio}}">
        <p>Mail de Contacto</p><input type="email" name="form_email" value="{{$vivienda->mail}}">
        <button type="submit">Actualizar Registro</button>        
        <button type="reset">Limpiar Formulario</button>
    </form> 
@endsection