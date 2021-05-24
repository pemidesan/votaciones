<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\vecinosVivienda;
use App\Models\Comunidad;
use App\Models\Vivienda;

class LwCrearVecinoVivienda extends Component
{
    
    public $selectedComunidad = null;
    

    public $viviendas = null;

    public $fecha_inicio;
    public $fecha_fin;
    public $vecino_id;
    public $vivienda_id;

    
    public function render()
    {
        $comunidades = Comunidad::all();        
        return view('livewire.lw-crear-vecino-vivienda', ['comunidades'=>$comunidades,'vecino_id'=>$this->vecino_id]);    
    }


    public function updatedselectedComunidad($comunidad_id)
    {
        $this -> viviendas = Vivienda::where('comunidad_id','=',$comunidad_id)->get();
    }

    public function submit()
    {  
       
        $registro=$this->validate(['fecha_inicio'=>'required|date',
        'fecha_fin'=>'required|date',
        'vecino_id'=>'required',                
        'vivienda_id'=>'required',                
        ]);

        //dd($this->fecha_inicio, $this->fecha_fin, $this->vecino_id, $this->vivienda_id);
      
        vecinosVivienda::create([
            'fecha_inicio'=>$this->fecha_inicio,
            'fecha_fin'=>$this->fecha_fin,
            'vecino_id'=>$this->vecino_id,
            'vivienda_id'=>$this->vivienda_id
        ]);

        return redirect()->to('vecinos'); 
        
    }
}
