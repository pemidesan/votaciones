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
       $vecinos = Vecino::all();
       return view ('vecinos.listar-todos')->with(['vecinos'=> $vecinos]);
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
    }
}
