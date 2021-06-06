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
        //
        $comunidad = Comunidad::where ('id','=',$vivienda->comunidad_id)->first();
        $nombreComunidad = $comunidad->direccion;
        

        return view ('viviendas.editar') -> with (['nombreComunidad'=>$nombreComunidad,'vivienda'=>$vivienda]);
    }

    public function update(Request $request, Vivienda $vivienda)
    {
        
       $reglas=['form_numero'=>'required',
       'form_piso'=>'required',
       'form_puerta'=>'required',                       
       'form_escalera'=>'required',
       'form_ratio'=>'required',   
       'form_email'=>'required|email:rfc'     
        ];
        $request ->validate($reglas);

        $nuevaVivienda = Vivienda::find($vivienda->id);
        $nuevaVivienda->piso = $request->form_piso;
        $nuevaVivienda->puerta = $request->form_puerta;
        $nuevaVivienda->escalera = $request->form_escalera;
        $nuevaVivienda->ratio = $request->form_ratio;
        $nuevaVivienda->mail = $request->form_email;        
        $nuevaVivienda->save();

        return view ("viviendas.accionOk",['accion'=>'actualizado']);
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
                   'ratio'=>'required',
                   'mail'=>'required|email:rfc'                   
                   ];
         $request->validate($reglas);
         Vivienda::create([             
             'numero'=>$request['numero'],
             'piso'=>$request['piso'],
             'puerta'=>$request['puerta'],
             'escalera'=>$request['escalera'],
             'ratio'=>$request['ratio'],
             'mail'=>$request['mail'],
             'comunidad_id'=>$request['comunidad_id']
         ]);
         return view ('viviendas.accionOk')->with(['accion'=>'creada']);
     }
}