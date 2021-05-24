<?php

namespace App\Http\Controllers;
use App\Models\Vivienda;
use Illuminate\Support\Facades\DB;
use App\Models\Vecino;
use App\Models\vecinosVivienda;
use App\Models\Comunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Http\Livewire;

class VecinoViviendaController extends Controller
{
    //
    public function index(Vecino $vecino)
    {        
       
       $consulta="select vv.id, vec.nombre, vec.apellido1, vec.apellido2, c.direccion, vv.fecha_inicio, vv.fecha_fin,
                         viv.numero, viv.piso, viv.puerta, viv.escalera, viv.ratio
                  from vecinos as vec, vecinosViviendas vv , viviendas viv, comunidades c 
                  where vec.id = vv.vecino_id  and 
                        vv.vivienda_id =viv.id and
                        c.id=viv.comunidad_id  and
                        vec.id='".$vecino->id."'";
                        
       $resultado = DB::select($consulta);
       $datoVecino = $vecino ->nombre." ".$vecino->apellido1." ".$vecino->apellido2;
       //return $resultado;
     
                            
        
            return view ('vecinosViviendas.listar-todos',['resultado'=>$resultado, 'vecino_id'=>$vecino->id, 'datoVecino'=>$datoVecino]);
        //return $viviendasVecinos;
                            
       
    }

    public function create(string $vecino_id)
    {
        
        $nombreVecino = DB::table('vecinos') -> where('id','=',$vecino_id) ->first();

        $consulta = "select v.id, c.direccion, v.numero, v.piso, v.puerta, v.escalera 
                     from viviendas v, comunidades c where v.comunidad_id =c.id order by c.direccion";
                     

        $listaViviendas = DB::select($consulta);        
            

        $nombreCompleto = $nombreVecino->nombre." ".$nombreVecino->apellido1." ".$nombreVecino->apellido2;
        
                
        return  view ('vecinosViviendas.nuevo',['listaViviendas'=>$listaViviendas, 'vecino_id'=>$vecino_id,'nombreVecino'=>$nombreCompleto]);
    }

    public function store(Request $request)
    {
        //
       $reglas=['fecha_inicio'=>'required|date',
                'fecha_fin'=>'required|date',
                'id_vecino'=>'required',                
                'id_vivienda'=>'required',                
        ];
        $request ->validate($reglas);

        vecinosVivienda::create([
            'fecha_inicio'=>$request['fecha_inicio'],
            'fecha_fin'=>$request['fecha_fin'],            
            'vecino_id'=>$request['vecino_id'],
            'vivienda_id'=>$request['vivienda_id'],            
        ]);        

        //$nuevoVecino = $request;
        
       // return view ("vecinos.accionOk",['vecino'=>$request,'accion'=>'creado']);
    }
    
    public function destroy(string $id_vecinoVivienda)
    {
        $registroVivienda = vecinosVivienda::where('id','=',$id_vecinoVivienda);
        $registroVivienda ->delete();
    }

}
