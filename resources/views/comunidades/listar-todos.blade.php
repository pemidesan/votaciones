@extends('layout.main-layout')
@section('page-title','Comunidades')
@section('content-area')
    <h1>Comunidades</h1> 
    <form action="{{route('comunidades.create')}}" method="POST">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-primary btn-lg">Añadir</button>
    </form>  
    <table class="table">
        <thead>
            <tr>
             <!--   <th></th>
                <th></th>
                <th></th>-->
                <th></th>
                <th></th>
                <th></th>
                <th>Dirección</th>
                <th>Alias</th>
                <th>Ciudad</th>
                <th>Provincia</th>                
            </tr> 
         </thead>
         <tbody>
             @foreach ($comunidades as $c)
                <tr>
                    <td><a href="{{route('comunidades.show',['comunidad'=>$c])}}"><i class="bi bi-info-circle"></i></a></td>
                    <td><a href="{{route('comunidades.edit',['comunidad'=>$c])}}"><i class="bi bi-pencil"></i></a></td>
                    <td>
                        <form action="{{route('comunidades.destroy',['comunidad'=>$c])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit'><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td>{{$c->direccion}}</td>
                    <td>{{$c->alias}}</td>
                    <td>{{$c->ciudad}}</td>
                    <td>{{$c->provincia}}</td>
                </tr>
             @endforeach
         </tbody>
    </table>
@endsection