@extends('layout.main-layout')
@section('page-title','Nueva Votación')
@section('content-area')
    <h3>Resultados de la Votación</h3>
    <div class="alert alert-primary" role="alert">
        <h3>Encuesta</h3>         

        <input class="form-control" type="text"
                                    aria-label="Disabled input example" 
                                    value ="{{$pregunta}}" readonly>
    </div>
    <table class="table">
            <thead>
                <tr><td>Opción</td><td>Resultado</td></tr>
            </thead>
            <tbody>
            @foreach($vectorConteo as $clave => $dato)
                <tr>
                    <td>{{$clave}}</td>
                    <td>
                        <div class="progress" style="height: 30px;">
                            <div class="progress-bar" role="progressbar" 
                                        style="width:{{($dato/$contador)*100}}%" 
                                               aria-valuenow="{{($dato/$contador)*100}}" 
                                               aria-valuemin="0" aria-valuemax="100">{{$dato}}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>
@endsection