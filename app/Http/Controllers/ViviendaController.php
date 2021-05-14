<?php

namespace App\Http\Controllers;

use App\Models\Vivienda;
use App\Models\Comunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

 
 class ViviendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Comunidad $comunidad)
     {        
        $viviendasComunidad = Vivienda::where ('comunidad_id','=',$comunidad->id)->get();
       
        return view ('viviendas.listar-todos',['viviendas'=>$viviendasComunidad,'comunidad'=>$comunidad]);
        
     }

    

     public function show(Vivienda $vivienda, $direccion)
     {
         return view ('viviendas.listar-uno',['vivienda'=>$vivienda,'direccion'=>$direccion]);
         
     }

     public function edit(Vivienda $vivienda)
     {
         return ('edit');
     }

     public function destroy(Vivienda $vivienda)
     {
        $vivienda->delete();
        return view ('viviendas.accionOk') ->with(['accion'=>'eliminada']);
     }

     public function create(Comunidad $comunidad)
     {
         //return ("creación de viviendas en $comunidad->direccion");
         return view ('viviendas.nuevo',['comunidad'=>$comunidad]);
     }

     public function store (Request $request, Comunidad $comunidad)
     {
         
         $reglas =['numero'=>'required',
                   'piso'=>'required',
                   'puerta'=>'required',
                   'ratio'=>'required'                   
                   ];
         $request->validate($reglas);
         Vivienda::create([             
             'numero'=>$request['numero'],
             'piso'=>$request['piso'],
             'puerta'=>$request['puerta'],
             'escalera'=>$request['escalera'],
             'ratio'=>$request['ratio'],
             'comunidad_id'=>$request['comunidad_id']
         ]);
         return view ('viviendas.accionOk')->with(['accion'=>'creada']);
     }
}