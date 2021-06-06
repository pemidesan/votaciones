@extends('layout.main-layout')
@section('page-title','Encuestas')
@section('content-area')
    <br><h3>Encuestas de la reunion descrita como "{{$nombreReunion}}" convocada para el día {{$fechaReunion}}</h3><br>
    <form action="{{route('crearEncuesta',['reunion_id'=>$reunion_id])}}" method="POST">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-primary btn-lg">Crear Encuesta</button>
    </form>
    <table class="table">
        <thead>
            <tr>          
                <th></th>
                <th></th>
                <th></th>
                <th>Estado</th>
                <th>Pregunta</th>                                
            </tr> 
         </thead>
         <tbody>
             @foreach ($encuestas as $e)
                <tr>
                    <td>
                        @if($e->estado =="A")
                            <form action="{{route('lanzarEncuesta',['encuesta_id'=>$e->id])}}" method="GET">
                                @csrf
                                <button type='submit'>Lanzar Encuesta vecinos</button>
                            </form>
                                
                        @else
                            <form action="#" method="GET">
                                @csrf
                                <button disabled type='submit'>Lanzar Encuesta vecinos</button>
                            </form>
                                
                        @endif
                    </td>
                    <td>
                        @if($e->estado !="C")
                            <form action="{{route('cerrarVotacion',['encuesta_id'=>$e->id])}}" method="GET">
                                @csrf
                                <button type='submit'>Cerrar Votación</button>
                            </form>
                        @else
                            <form action="#" method="GET">
                                @csrf
                                <button disabled type='submit'>Cerrar Votación</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <form action="{{route('verResultados',['encuesta_id'=>$e->id])}}" method="GET">
                            @csrf
                            <button type='submit'>Ver Resultados</button>
                        </form>
                    </td>
                    <td>{{$e->estado}}</td>
                    <td>{{$e->pregunta}}</td>
                </tr>
             @endforeach
         </tbody>
    </table>
@endsection