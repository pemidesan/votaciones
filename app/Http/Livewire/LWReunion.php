<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comunidad;
use App\Models\Reunion;

class LWReunion extends Component
{
    public $selectedComunidad=-1;
    public $comunidades;    
    public $reunion_id;
    public $reuniones;

    public function render()
    {
        return view('livewire.l-w-reunion',['comunidades'=>$this->comunidades]);
    }

    public function updatedSelectedComunidad($comunidad_id)
    {
        
        $this -> reuniones = Reunion::where('comunidad_id','=',$comunidad_id)->get();
    }

    public function annadir($selectedComunidad)    
    {
        return redirect() -> route('crearReunion',['comunidad_id'=>$selectedComunidad]);
    }

}
