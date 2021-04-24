@extends('layout.main-layout')
@section('page-title','Página de vecinos')
@section('content-area')
    <h1>Lista total de vecinos</h1>    
    <table class="table">
        <thead>
           <tr>
               <th></th>
               <th></th>
               <th>Nombre</th>
               <th>Apellido1</th>
               <th>Apellido2</th>
               <th>Teléfono</th>
               <th>e-mail</th>
           </tr> 
           <tbody>
               @foreach($vecinos as $v)
                <tr>
                    <td><a href="{{route('vecinos.show',['vecino'=>$v])}}"><i class="bi bi-info-circle"></i></a></td>
                    <td><a href="{{route('vecinos.edit',['vecino'=>$v])}}"><i class="bi bi-pencil"></i></a></td>
                    <td>{{$v->nombre}}</td>
                    <td>{{$v->apellido1}}</td>
                    <td>{{$v->apellido2}}</td>
                    <td>{{$v->telefono}}</td>
                    <td>{{$v->mail}}</td>
                </tr>
               @endforeach
           </tbody>
        </thead>
    </table>
@endsection
