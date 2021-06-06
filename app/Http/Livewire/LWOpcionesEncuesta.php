<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Encuesta;

class LWOpcionesEncuesta extends Component
{
    public $reunion_id;
    public $nombreReunion;
    public $admins;
    public $pregunta;
    public $vectorOpciones="";

    public $opcion;
    public $texto;
    public $contador =0;
    public $estado='A';


    public function render()
    {
    
        return view('livewire.l-w-opciones-encuesta',['reunion_id'=>$this->reunion_id,
                                                      'nombreReunion'=>$this->nombreReunion,
                                                      'admins'=>$this->admins,
                                                      'pregunta'=>$this->pregunta,
                                                      'opcion'=>$this->opcion,
                                                      'vectorOpciones'=>$this->vectorOpciones,
                                                      'texto'=>$this->texto,
                                                      'contador'=>$this->contador
                                                      ]);
    }

    public function annadirOpcion()
    {
        $this->dispatchBrowserEvent('fomulario-ver');
    }


    public function grabarOpcion()
    {
        $this->contador++;
        $this->opcion = $this->contador.". ".$this->opcion; 
        if ($this->vectorOpciones=="")
        {
            $this->vectorOpciones= $this->opcion;
            $this->texto = '<tr><td>'.$this->opcion.'</tr></td>';
        }
        else
        {
            $this->vectorOpciones= $this->vectorOpciones.";".$this->opcion;
            $this->texto =$this->texto.'<tr><td>'.$this->opcion.'</tr></td>';
        }
        $this ->dispatchBrowserEvent('formulario-ocultar');
        $this->opcion="";
        return redirect() ->back();        
        
    }

    public function grabarPersistente()
    {
        $registro=$this->validate(['pregunta'=>'required','vectorOpciones'=>'required']);

        Encuesta::create([
            'pregunta'=>$this->pregunta,
            'vectorOpciones'=>$this->vectorOpciones,
            'estado'=>$this->estado,
            'reunion_id'=>$this->reunion_id
        ]);

       // return redirect()->to('verEncuestas',['reunion_id'=>$this->reunion_id]);      
        return redirect('encuestas/listar/'.$this->reunion_id);

        
    }
}
