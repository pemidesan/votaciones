<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Models\Reunion;
use App\Models\Administrator;
use Illuminate\Support\Facades\DB;

class ReunionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $comunidades = Comunidad::all();
        return view ('reuniones.listar-todos',['comunidades'=>$comunidades]);
    }
    
    public function create($comunidad_id)
    {
        $consulta="select a.id as id, c.direccion, a.nombre as nombre, a.apellido1 as apellido1, apellido2 as apellido2  from administrators a , administradoresComunidades ac , comunidades c
                    where c.id=ac.comunidad_id and ac.administrator_id =a.id and  ac.comunidad_id =".$comunidad_id;
        
        $adminAsignado = DB::select($consulta);       

        if (count($adminAsignado)>0)
        {
            $regAsignado = DB::select($consulta)[0];              
            $nombreAdmin = $regAsignado->nombre." ".$regAsignado->apellido1." ".$regAsignado->apellido2;
            $nombreComunidad = $regAsignado->direccion;
            $administrator_id = $regAsignado->id;
            return view ('reuniones.nuevo',['nombreAdmin'=>$nombreAdmin,
                                            'administrator_id'=>$administrator_id,
                                            'comunidad_id'=>$comunidad_id,
                                            'nombreComunidad'=>$nombreComunidad]);
        
        }
        
        else
            return ("fallazo");
    }

    public function store(Request $request)
    {

        $reglas=['fecha'=>'required|date',
        'descripcion'=>'required',
        'administrator_id'=>'required',
        'comunidad_id'=>'required',        
        ];

        $request ->validate($reglas);

        Reunion::create([
            'fecha'=>$request['fecha'],
            'descripcion'=>$request['descripcion'],
            'administrator_id'=>$request['administrator_id'],
            'comunidad_id'=>$request['comunidad_id']            
        ]);

        return view ('reuniones.accionOk');

    }
    
    
}
