@extends('layout.main-layout')
@section('page-title','Nueva Vivienda')
@section('content-area')
    <h2>Comunidades {{$comunidad->direccion}}</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    @endif
    <form action="{{route('viviendaGrabar',['comunidad'=>$comunidad])}}" method="POST">
        @csrf
        @method('POST')
        <h3><legend>Alta de nueva Vivienda</legend></h3>        
        <p>Dirección</p><input type="text" size="50" readonly name="direccion" value="{{$comunidad->direccion}}">
        <p>Número</p><input type="text" name="numero" value="{{old('numero')}}">
        <p>Piso</p><input type="text" name="piso" value="{{old('piso')}}">
        <p>Puerta</p><input type="text" name="puerta" value="{{old('puerta')}}">        
        <p>Escalera</p><input type="text" name="escalera" value="{{old('escalera')}}">  
        <p>Ratio</p><input type="text" name="ratio" value="{{old('ratio')}}">
        <p>Mail de contacto</p><input type="email" name="mail" value="{{old('mail')}}"> 
        <input type="hidden" name="comunidad_id" value="{{$comunidad->id}}">
        <br><br><br>
        <button type="submit">Crear Registro</button>        
        <button type="reset">Limpiar Formulario</button>
    </form>   
@endsection