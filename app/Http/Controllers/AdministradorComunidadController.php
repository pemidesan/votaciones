<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\Administrator;
use App\Models\Comunidad;
use App\Models\administradoresComunidad;

class AdministradorComunidadController extends Controller
{
    //
    public function index(Administrator $administrator)
    {
        $consulta = 
        "select c.direccion, c.alias, c.ciudad, c.provincia, ac.id as acid from 
           administrators a , comunidades c, administradoresComunidades ac 
        where 
        a.id = ac.administrator_id and ac.comunidad_id =c.id and a.id='".$administrator->id."'";
        $resultado = DB::select($consulta);
        $datoAdministrador = $administrator ->nombre." ".$administrator->apellido1." ".$administrator->apellido2;
        
        return view ('administratorsComunidad.listar-todos',['resultado'=>$resultado, 'administrator_id'=>$administrator->id]);
    }

    public function create(string $administrator_id)
    {
        
        $nombreAdministrator = DB::table('administrators') -> where('id','=',$administrator_id) ->first();
        $listaComunidades = Comunidad::all();
            
                
        return  view ('administratorsComunidad.nuevo',['listaComunidades'=>$listaComunidades,'nombreAdministrator'=>$nombreAdministrator]);
    }

    public function store(Request $request)
    {
        //
       $reglas=['administrator_id'=>'required',
                'comunidad_id'=>'required',                
        ];

        $request ->validate($reglas);

        administradoresComunidad::create([
            'administrator_id'=>$request['administrator_id'],
            'comunidad_id'=>$request['comunidad_id']                       
        ]);        

        //dd($request['administrator_id'], $request['comunidad_id']);

        return view ('administratorsComunidad.accionOk',['comentario'=>'asignado a comunidad']);
    }

    public function destroy(string $id_administradorComunidad)
    {
        $registroVivienda = administradoresComunidad::where('id','=',$id_administradorComunidad);
        $registroVivienda ->delete();
        return view ('administratorsComunidad.accionOk',['comentario'=>'desasignado de comunidad']);
    }

}
