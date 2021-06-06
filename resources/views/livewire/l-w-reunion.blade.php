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
    <br>

    @if($selectedComunidad != -1)             
        <button wire:click="annadir({{$selectedComunidad}})" class="btn btn-primary">Añadir Reunión</button>
    @endif

    @if(!is_null($reuniones))
        <div class="form-group">           
            <br><br><h3>Reuniones Activas</h3>
            <table class="table" name="vivienda_id" wire:model="reuniones">      
                <thead>
                    <tr><td>Fecha Reunión</td><td>Descripción o título</td><td>Eliminar Reunión</td><td></td></tr>
                </thead>      
                
                    @foreach ($reuniones as $r)
                    <tr>
                        <td>{{$r->fecha}}</td>
                        <td>{{$r->descripcion}}</td>
                        <td>
                            <form action="{{route('borrarReunion',['reunion'=>$r])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit'><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('verEncuestas',['reunion_id'=>$r->id])}}" method="GET">
                                @csrf
                                @method('GET')
                                <button type='submit' class="btn btn-success">Gestión de Votaciones</button>
                            </form>	
                        </td>
                    </tr>


                    @endforeach        
            </select>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Sin Reuniones asignadas
        </div>
    @endif
    
    
</div>
</div>

