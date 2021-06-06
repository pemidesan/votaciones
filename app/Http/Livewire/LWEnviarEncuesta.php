<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Encuesta;
use Illuminate\Support\Facades\DB;
use App\Mail\VotoMailable;
use Illuminate\Support\Facades\Mail;

class LWEnviarEncuesta extends Component
{
    public $encuesta_id;
    public $encuesta;
    public $vectorRespuesta;
    public $viviendasComunidad;
    public $aliasComunidad;
    public $selectedVc=[];
    public $vectorViviendas;



    public function render()
    {
        $consultaViviendas="select * from viviendas v where v.comunidad_id =(
                                    select id from comunidades c where id = (
                                            select r.comunidad_id  from reuniones r where r.id =(
                                                    select e.reunion_id from encuestas e where id =".$this->encuesta_id.")))";

        $consultaAliasComunidad ="select c.alias as alias from comunidades c where id = (
                                                        select r.comunidad_id  from reuniones r where r.id =(
                                                                select e.reunion_id from encuestas e where id =1))";
        
        $this->viviendasComunidad = DB::select($consultaViviendas);    
        $this->aliasComunidad = DB::selectOne($consultaAliasComunidad)->alias; 
        $this->encuesta = Encuesta::where('id',$this->encuesta_id)->first();
        $this->vectorRespuesta = explode(';', $this->encuesta->vectorOpciones);
       // dd($this->aliasComunidad->alias);
        return view('livewire.l-w-enviar-encuesta');
        //dd($this->encuesta_id);
    }

    public function grabarRemitentes()
    {
        
        $this->vectorViviendas =  implode(";", $this->selectedVc);
        $nuevaEncuesta = Encuesta::find($this->encuesta_id);
        $nuevaEncuesta->vectorViviendas = $this->vectorViviendas;
        $nuevaEncuesta->estado = "E";
        $nuevaEncuesta->save();

       

        
        foreach ($this->selectedVc as $item =>$direccion)
        {
           $correo = new VotoMailable($direccion,$nuevaEncuesta->id,$nuevaEncuesta->pregunta);           
           Mail::to($direccion)->send($correo);
           sleep(1);
       
        }
        return redirect('/');
    

    }
}
