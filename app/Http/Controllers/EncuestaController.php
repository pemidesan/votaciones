<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuesta;
use App\Models\Reunion;
use Illuminate\Support\Facades\DB;

class EncuestaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //fir

    public function index($reunion_id)
    {
        $encuestas = Encuesta::where('reunion_id',$reunion_id)->get();
        $nombreReunion = Reunion::select('descripcion')->where('id',$reunion_id)->first();
        $fechaReunion = Reunion::select('fecha')->where('id',$reunion_id)->first();
        return view ('encuestas.listar-todos',['fechaReunion'=>$fechaReunion->fecha,'nombreReunion'=>$nombreReunion->descripcion,'reunion_id'=>$reunion_id,'encuestas'=>$encuestas]);
    }

    public function create($reunion_id)
    {
        $consultaAdministrador="select CONCAT(a.nombre,' ',a.apellido1,' ',a.apellido2) nombre
                                       from administrators a where a.id in (select administrator_id from votaciones.reuniones r
                                                                                                    where r.id = ".$reunion_id.")"; 
        $admins = DB::selectOne($consultaAdministrador);  
        $nombreReunion = Reunion::where('id',$reunion_id)->first();
        
        return view ('encuestas.nuevo',['reunion_id'=>$reunion_id,'nombreReunion'=>$nombreReunion->descripcion,'admins'=>$admins->nombre]);
    }
    
    public function lanzar($encuesta_id)
    {
        return view ('encuestas.lanzar',['encuesta_id'=>$encuesta_id]);
    }


    public function votar($encuesta_id,$email)
    {
        $encuesta =Encuesta::where('id',$encuesta_id)->first();
        //dd($encuesta["pregunta"]);
        return view ('encuestas.votar',['encuesta'=>$encuesta,'email'=>$email]);

    }

    public function grabarVoto(Request $request,$email,$encuesta_id)
    {
       //dd($request->form_opcion,$email,$encuesta_id);
       $encuesta =Encuesta::where('id',$encuesta_id)->first();
       if ($encuesta->estado != "C")
       {
            $pos = strpos($encuesta->vectorVotos, $email);
            //dd($encuesta->vectorVotos,$email,$pos);
            if($pos===false)
            {    
                 $nuevoVoto=$email."=>".$request->form_opcion;
                 $nuevaEncuesta = Encuesta::find($encuesta_id);
                 if($nuevaEncuesta->vectorVotos=="")
                 {
                     $nuevaEncuesta->vectorVotos=$nuevoVoto;
                 }
                 else
                 {
                     $nuevaEncuesta->vectorVotos = $nuevaEncuesta->vectorVotos.";".$nuevoVoto;
                 }
                 $nuevaEncuesta->save();
                 return redirect('/');

            }
            else{
             return "Error, este usuario ya emitió un voto";
            }
        }
        else{
            return "Error, votación fuera del plazo marcado, consulte con el Administrador.";
        }
    }

    public function cerrarVotacion($encuesta_id)
    {
        $nuevaEncuesta = Encuesta::find($encuesta_id);
        $nuevaEncuesta->estado='C';
        $nuevaEncuesta->save();
        return redirect('/');
    }

    public function verResultados($encuesta_id)
    {
        $encuesta = Encuesta::where('id',$encuesta_id)->first();
        $matrizVotos = explode(';',$encuesta->vectorVotos);
        $contador =count($matrizVotos);
        $listaRespuestas="";
        foreach($matrizVotos as $item =>$valor)
        {
            $respuesta = explode('=>',$valor);
            if ($listaRespuestas=="")
            {
                $listaRespuestas=$respuesta[1];
            }
            else
            {
                $listaRespuestas=$listaRespuestas.';'.$respuesta[1];
            }
        }
        $vectorResultados = explode(';',$listaRespuestas);
        $vectorConteo = array_count_values($vectorResultados);
        arsort($vectorConteo, SORT_NUMERIC);
        
        

        return view('encuestas.verResultados',['vectorConteo'=>$vectorConteo,'pregunta'=>$encuesta->pregunta,'contador'=>$contador]);
    }


}
