@extends('layout.main-layout')
@section('page-title','AdministradorComunidad')
@section('content-area')
    <h1> Comunidades del administrador {{\App\Models\Administrator::select('nombre')->where('administrators.id','=',$administrator_id)->first()["nombre"]." ".
                                         \App\Models\Administrator::select('apellido1')->where('administrators.id','=',$administrator_id)->first()["apellido1"]." ".
                                         \App\Models\Administrator::select('apellido2')->where('administrators.id','=',$administrator_id)->first()["apellido2"]}}</h1>
    
    <form action="{{route('crearAdministradorComunidad',['administrator_id'=>$administrator_id])}}" method="POST">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-primary btn-lg">Añadir</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <td>Direccion</td>
                <td>Alias</td>
                <td>Ciudad</td>
                <td>Provincia</td>   
                <td></td>            
            </tr>
        </thead>
        <tbody>
            @foreach($resultado as $res)
                <tr>                    
                    <td>{{$res->direccion}}</td>
                    <td>{{$res->alias}}</td>
                    <td>{{$res->ciudad}}</td>
                    <td>{{$res->provincia}}</td>                                        
                    <td>
                        <form action="{{route('borrarAdministradorComunidad',['id_administradorComunidad'=>$res->acid])}}" method="POST">
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