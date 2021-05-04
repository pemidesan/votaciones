<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use Illuminate\Http\Request;

class ComunidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comunidades = Comunidad::paginate(50);
        return view ('comunidades.listar-todos',['comunidades'=>$comunidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('comunidades.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $reglas=['direccion'=>'required',
        'ciudad'=>'required',
        'provincia'=>'required'
        ];
        $request->validate($reglas);
        Comunidad::create([
            'direccion'=>$request['direccion'],
            'alias'=>$request['alias'],
            'ciudad'=>$request['ciudad'],
            'provincia'=>$request['provincia']
        ]);
        return view ("comunidades.accionOk",['comunidades'=>$request,'accion'=>'creado']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidad $comunidad)
    {
        //
        return view ('comunidades.listar-uno') ->with(['unaComunidad'=>$comunidad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunidad $comunidad)
    {
        //
        return view ('comunidades.editar') ->with (['unaComunidad'=>$comunidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comunidad $comunidad)
    {
        //
         //
         $reglas=['form_direccion_comunidad'=>'required',
                  'form_ciudad_comunidad'=>'required',                  
                  'form_provincia_comunidad'=>'required'
         ];
         $request->validate($reglas);

         $nuevaComunidad = Comunidad::find($comunidad->id);
         $nuevaComunidad -> direccion = $request ->form_direccion_comunidad;
         $nuevaComunidad -> alias = $request ->form_alias_comunidad;
         $nuevaComunidad -> ciudad = $request -> form_ciudad_comunidad;
         $nuevaComunidad -> provincia = $request ->form_provincia_comunidad;
         $nuevaComunidad -> save();
         return view ("comunidades.accionOk",['comunidades'=>$nuevaComunidad,'accion'=>'actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidad $comunidad)
    {
        //
        $comunidad->delete();
        return view ("comunidades.accionOk",['comunidades'=>$comunidad,'accion'=>'borrado']);
    }
}
