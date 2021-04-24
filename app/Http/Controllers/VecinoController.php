<?php

namespace App\Http\Controllers;

use App\Models\Vecino;
use Illuminate\Http\Request;

class VecinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // return "Lista de vecinos en el sistema";
       $vecinos = Vecino::paginate(50);
       return view ('vecinos.listar-todos',['vecinos'=>$vecinos]);
      // return view ('vecinos.listar-todos',['vecinos'=>$vecinos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('vecinos.nuevo');
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
       $reglas=['nombre'=>'required',
                'apellido1'=>'required',
                'apellido2'=>'required',
                'telefono'=>'required',
                'mail'=>'required|email:rfc,dns',        
        ];
        $request ->validate($reglas);

        Vecino::create([
            'nombre'=>$request['nombre'],
            'apellido1'=>$request['apellido1'],
            'apellido2'=>$request['apellido2'],
            'telefono'=>$request['telefono'],
            'mail'=>$request['mail']
        ]);

        //$nuevoVecino = $request;
        
        return view ("vecinos.accionOk",['vecino'=>$request,'accion'=>'creado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vecino  $vecino
     * @return \Illuminate\Http\Response
     */
    public function show(Vecino $vecino)
    {
        //
        return view ('vecinos.listar-uno') -> with (['unVecino'=>$vecino]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vecino  $vecino
     * @return \Illuminate\Http\Response
     */
    public function edit(Vecino $vecino)
    {
        //
        return view ('vecinos.editar') -> with (['unVecino'=>$vecino]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vecino  $vecino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vecino $vecino)
    {
        //
            //
       $reglas=['form_nombre_vecino'=>'required',
       'form_apellido1_vecino'=>'required',
       'form_apellido2_vecino'=>'required',                       
       'form_telefono_vecino'=>'required',
       'form_email_vecino'=>'required|email:rfc,dns',        
        ];
        $request ->validate($reglas);

        $nuevoVecino = Vecino::find($vecino->id);
        $nuevoVecino->nombre = $request->form_nombre_vecino;
        $nuevoVecino->apellido1 = $request->form_apellido1_vecino;
        $nuevoVecino->apellido2 = $request->form_apellido2_vecino;
        $nuevoVecino->telefono = $request->form_telefono_vecino;
        $nuevoVecino->mail = $request->form_email_vecino;
        $nuevoVecino->save();

        return view ("vecinos.accionOk",['vecino'=>$nuevoVecino,'accion'=>'actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vecino  $vecino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vecino $vecino)
    {
        //
        $vecino->delete();
        return view ("vecinos.accionOk",['vecino'=>$vecino,'accion'=>'borrado']);
    }
}
