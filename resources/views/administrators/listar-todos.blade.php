@extends('layout.main-layout')
@section('page-title','Administradores')
@section('content-area')
    <h1>Administradores</h1>    
   
    {{$administrators ->links()}}
    <form action="{{route('administrators.create')}}" method="POST">
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
               @foreach($administrators as $a)
                <tr>
                    <td><a href="{{route('administrators.show',['administrator'=>$a])}}"><i class="bi bi-info-circle"></i></a></td>
                    <td><a href="{{route('administrators.edit',['administrator'=>$a])}}"><i class="bi bi-pencil"></i></a></td>

                   <!-- <td><a href="{{route('administrators.destroy',['administrator'=>$a])}}"><i class="bi bi-trash"></i></a></td>-->
                    <td>
                        <form action="{{route('administrators.destroy',['administrator'=>$a])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit'><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td>{{$a->nombre}}</td>
                    <td>{{$a->apellido1}}</td>
                    <td>{{$a->apellido2}}</td>
                    <td>{{$a->telefono}}</td>
                    <td>{{$a->mail}}</td>
                </tr>
               @endforeach
           </tbody>
       
    </table>
    {{$administrators ->links()}}    
@endsection
