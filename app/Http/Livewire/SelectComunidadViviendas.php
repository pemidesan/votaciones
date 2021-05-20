<?php

namespace App\Http\Livewire;




use Illuminate\Http\Request;

use Livewire\Component;
use App\Models\Comunidad;
use App\Models\Vivienda;

class SelectComunidadViviendas extends Component
{
    public $selectedComunidad = null;
    public $selectedVivienda = null;

    //public $comunidades = null;
    public $viviendas = null;

    public function render()
    {
        $comunidades = Comunidad::all();
        
        return view('livewire.select-comunidad-viviendas',['comunidades'=>$comunidades]);
    }

    public function updatedSelectedComunidad($comunidad_id)
    {
        $this -> viviendas = Vivienda::where('comunidad_id','=',$comunidad_id)->get();
    }
}
