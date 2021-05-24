
<form wire:submit.prevent="submit">
        <div class="alert alert-success" role="alert">
            Alta para vecino {{App\Models\Vecino::select('nombre','apellido1','apellido2')->where('id','=',$vecino_id)->first()}}
        </div>    

        <div class="form-group">
            <label for="comunidades">Comunidades</label>
            <select class="form-control" name="comunidades" wire:model="selectedComunidad">
                <option value="">==Comunidades==</option>        
                @foreach ($comunidades as $c)
                    <option value="{{$c->id}}">{{$c->direccion}}</option>
                @endforeach        
            </select>
        </div>


        <div class="form-group">
            <label for="viviendas">Viviendas</label>
            <select class="form-control" name="vivienda_id" wire:model="vivienda_id">
                <option value="">==Viviendas==</option>        
                @if(!is_null($viviendas))
                    @foreach ($viviendas as $v)
                        <option value="{{$v->id}}">{{"Número $v->numero - Piso $v->piso - Puerta $v->puerta - Escalera:$v->escalera"}}</option>
                    @endforeach        
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio</label>
            <input class="form-control" name="fecha-inicio" type="date" wire:model="fecha_inicio">                                    
        </div>

        <div class="form-group">
            <label for="fecha_fin">Fecha de Inicio</label>
            <input class="form-control" type="date" name="fecha_fin" wire:model="fecha_fin">                                    
        </div>
        <br>


        <button type="submit" class="btn btn-primary">Añadir Vivienda</button>
    </form>

