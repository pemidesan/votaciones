<div>
    <div>
    <div class="form-group">
        <h5>Seleccione una comunidad</h5>
        <label for="comunidades"></label>
        <select class="form-control" name="comunidades" wire:model="selectedComunidad">
            <option value=-1>==Comunidades==</option>        
            @foreach ($comunidades as $c)
                <option value="{{$c->id}}">{{$c->direccion}}</option>
            @endforeach        
        </select>
    </div>

    @if(!is_null($reuniones))
        <div class="form-group">           
            <br><br><h3>Reuniones Activas</h3>
            <table class="table" name="vivienda_id" wire:model="reuniones">            
                <tr><td>Fecha Reunión</td><td>Descripción o título</td></tr>
                    @foreach ($reuniones as $r)
                    <tr>
                    <td><div class="alert alert-success" role="alert">
                        {{$r->fecha}}</td>
                        <td><div class="alert alert-success" role="alert">
                            {{$r->descripcion}}</td>
                    </tr>


                    @endforeach        
            </select>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Sin Reuniones asignadas
        </div>
    @endif
    
    @if($selectedComunidad != -1)             
        <button wire:click="annadir({{$selectedComunidad}})" class="btn btn-primary">Añadir Reunión</button>
    @endif
</div>
</div>

