<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
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
       $administrators = Administrator::paginate(50);
       return view ('administrators.listar-todos',['administrators'=>$administrators]);
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
        return view ('administrators.nuevo');
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

        Administrator::create([
            'nombre'=>$request['nombre'],
            'apellido1'=>$request['apellido1'],
            'apellido2'=>$request['apellido2'],
            'telefono'=>$request['telefono'],
            'mail'=>$request['mail']
        ]);

        //$nuevoVecino = $request;

        return view ("administrators.accionOk",['administrator'=>$request,'accion'=>'creado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        //
        return view ('administrators.listar-uno') -> with (['unAdministrator'=>$administrator]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        //
        return view ('administrators.editar') -> with (['unAdministrator'=>$administrator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrator $administrator)
    {
        //
        $reglas=['form_nombre_administrator'=>'required',
        'form_apellido1_administrator'=>'required',
        'form_apellido2_administrator'=>'required',                       
        'form_telefono_administrator'=>'required',
        'form_email_administrator'=>'required|email:rfc,dns',        
         ];
         $request ->validate($reglas);
 
         $nuevoAdministrator = Administrator::find($administrator->id);
         $nuevoAdministrator->nombre = $request->form_nombre_administrator;
         $nuevoAdministrator->apellido1 = $request->form_apellido1_administrator;
         $nuevoAdministrator->apellido2 = $request->form_apellido2_administrator;
         $nuevoAdministrator->telefono = $request->form_telefono_administrator;
         $nuevoAdministrator->mail = $request->form_email_administrator;
         $nuevoAdministrator->save();
 
         return view ("administrators.accionOk",['administrator'=>$nuevoAdministrator,'accion'=>'actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrator $administrator)
    {
        //
        $administrator->delete();
        return view ("administrators.accionOk",['administrator'=>$administrator,'accion'=>'borrado']);
    }
}
