@extends('layout.main-layout')
@section('page-title','Viviendas')
@section('content-area')
    <h1>Viviendas de comunidad {{$comunidad->alias}}</h1>
    <h2>Dirección: {{$comunidad->direccion}}</h2> 
    <form action="{{route('crearVivienda',['comunidad'=>$comunidad])}}" method="POST">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-primary btn-lg">Añadir</button>
    </form>  
    <table class="table">
        <thead>
            <tr>
                <th>Info</th>
                <th>Borrar</th>
                <th>Número</th>
                <th>Piso</th>
                <th>Puerta</th>
                <th>Escalera</th>
                <th>Ratio</th>  
            </tr> 
         </thead>
         <tbody>
            @foreach ($viviendas as $vi)
                <tr>                         
                  
                    <td><a href="{{route('unaVivienda',['vivienda'=>$vi,'direccion'=>$comunidad->direccion])}}"><i class="bi bi-info-circle"></i></a></td>              
                    <td>
                        <form action="{{route('borrarVivienda',['vivienda'=>$vi])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit'><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td>{{$vi->numero}}</td>
                    <td>{{$vi->piso}}</td>
                    <td>{{$vi->puerta}}</td>
                    <td>{{$vi->escalera}}</td>
                    <td>{{$vi->ratio}}</td>
                </tr>
                

            @endforeach
         </tbody>
    
   
  

@endsection