<div>
    <form>

        <div class="alert alert-primary" role="alert">
            <h3>Encuesta</h3>         

            <input class="form-control" type="text"
                                        aria-label="Disabled input example" 
                                        value ="{{$encuesta->pregunta}}" disabled readonly>
            
            @foreach($vectorRespuesta as $vr)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                    <label class="form-check-label" for="flexRadioDisabled">
                      {{$vr}}
                    </label>
                </div>
            @endforeach
        </div>

        
        <br><br>

        <div class="alert alert-primary" role="alert">
            <h3>Seleccione vecinos participantes en votación de comunidad: {{$aliasComunidad}}</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Participa</th>
                        <th>Email de Contacto</th>
                        <th>Número</th>
                        <th>Piso</th>
                        <th>Puerta</th>
                        <th>Escalera</th>
                        <th>Ratio</th>  
                    </tr> 
                </thead>
                <tbody>
                @foreach($viviendasComunidad as $vc)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="selectedVc" value="{{$vc->mail}}" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                  
                                </label>
                            </div>
                        </td>
                        <td>{{$vc->mail}}</td>
                        <td>{{$vc->numero}}</td>
                        <td>{{$vc->piso}}</td>
                        <td>{{$vc->puerta}}</td>
                        <td>{{$vc->escalera}}</td>
                        <td>{{$vc->ratio}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <button type="button" wire:click.prevent="grabarRemitentes" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Enviar Encuesta a vecinos
        </button>




    </form>
</div>
