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

@if(!is_null($viviendas))
<div>

    <p>Viviendas</p>
    <select wire:model="selectedVivienda">
        <option value="">==Viviendas==</option>        
        @foreach ($viviendas as $v)
            <option value="{{$v->id}}">{{"Número $v->numero - Piso $v->piso - Puerta $v->puerta - Escalera:$v->escalera"}}</option>
        @endforeach        
    </select>
</div>
@endif
</div>