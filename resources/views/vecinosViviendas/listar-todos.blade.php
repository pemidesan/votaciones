@extends('layout.main-layout')
@section('page-title','VecinosViviendas')
@section('content-area')
    <h1>Viviendas del vecino {{$datoVecino}}</h1>  
    <form action="{{route('crearVecinoVivienda',['id_vecino'=>$id_vecino])}}" method="POST">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-primary btn-lg">Añadir Vivienda</button>
    </form>  
    <table class="table">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Dirección</td>
                <td>Fecha Inicio</td>
                <td>Fecha Fin</td>
                <td>Número</td>
                <td>Piso</td>
                <td>Puerta</td>
                <td>Escalera</td>
                <td>Ratio</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            @foreach($resultado as $res)
                <tr>
                    <td>{{$res->nombre." ".$res->apellido1." ".$res->apellido2}}</td>                    
                    <td>{{$res->direccion}}</td>
                    <td>{{$res->fecha_inicio}}</td>
                    <td>{{$res->fecha_fin}}</td>
                    <td>{{$res->numero}}</td>
                    <td>{{$res->piso}}</td>
                    <td>{{$res->puerta}}</td>
                    <td>{{$res->escalera}}</td>
                    <td>{{$res->ratio}}</td>
                    <td>
                        <form action="{{route('borrarVecinoVivienda',['id_vecinoVivienda'=>$res->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit'><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    
   
    
   
  

@endsection