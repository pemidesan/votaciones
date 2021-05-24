<div>
    <div>

        <p>Comunidades</p>
        <select wire:model="selectedComunidad">
            <option value="">==Comunidades==</option>        
            @foreach ($comunidades as $c)
                <option value="{{$c->id}}">{{$c->direccion}}</option>
            @endforeach        
        </select>
     </div>


    <div>
        <p>Viviendas</p>
        <select name= "vivienda_id" wire:model="selectedVivienda">
            <option value="">==Viviendas==</option>        
            @if(!is_null($viviendas))
                @foreach ($viviendas as $v)
                    <option value="{{old('$v->id')}}">{{"Número $v->numero - Piso $v->piso - Puerta $v->puerta - Escalera:$v->escalera"}}</option>
                @endforeach        
            @endif
        </select>
    </div>
    
</div>