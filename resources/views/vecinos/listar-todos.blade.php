@extends('layout.main-layout')
@section('page-title','Vecinos')
@section('content-area')
    <h1>Vecinos</h1>    
   
    {{$vecinos ->links()}}
    <form action="{{route('vecinos.create')}}" method="POST">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-primary btn-lg">Añadir</button>
    </form>
    <table class="table">
        <thead>
           <tr>
               <th></th>
               <th></th>
               <th></th>
               <th>Nombre</th>
               <th>Apellido1</th>
               <th>Apellido2</th>
               <th>Teléfono</th>
               <th>e-mail</th>
           </tr> 
        </thead>
           <tbody>
               @foreach($vecinos as $v)
                <tr>
                    <td><a href="{{route('vecinos.show',['vecino'=>$v])}}"><i class="bi bi-info-circle"></i></a></td>
                    <td><a href="{{route('vecinos.edit',['vecino'=>$v])}}"><i class="bi bi-pencil"></i></a></td>

                   <!-- <td><a href="{{route('vecinos.destroy',['vecino'=>$v])}}"><i class="bi bi-trash"></i></a></td>-->
                    <td>
                        <form action="{{route('vecinos.destroy',['vecino'=>$v])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit'><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td>{{$v->nombre}}</td>
                    <td>{{$v->apellido1}}</td>
                    <td>{{$v->apellido2}}</td>
                    <td>{{$v->telefono}}</td>
                    <td>{{$v->mail}}</td>
                </tr>
               @endforeach
           </tbody>
       
    </table>
    {{$vecinos ->links()}}    
@endsection
