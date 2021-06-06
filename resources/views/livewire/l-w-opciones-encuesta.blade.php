<div>
    <h2>Crear Votación</h2>
    <br>
    <h5>Administrador: {{$admins}}</h5>
    <h5>Descripción de la Reunión: {{$nombreReunion}}</h5>
    <br>

    @if($vectorOpciones!="")
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button " wire:click.prevent="grabarPersistente" class="btn btn-success btn-lg me-md-2">Guardar y Salir</button>
        </div>
    @endif
    <br>
    
    <div class="form-floating">
        <textarea class="form-control" wire:model.defer="pregunta" placeholder="Texto de la consulta" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Escriba en este cuadro la pregunta que se planteará a los vecinos...</label>
    </div>
    <br>

   <!-- Button trigger modal -->
    <button type="button" wire:click.prevent="annadirOpcion" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Añadir opción de voto
    </button>
    <br><br>


    <table class="table"><thead><tr><th>Opciones Posibles</th></tr></thead><tbody>{!!$texto !!}</tbody></table>

     
      <!-- Modal -->
     
      <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form autocomplete="off" wire:submit.prevent="grabarOpcion">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Escriba una posible opción...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>  
                  <div class="modal-body">
                      <div class="mb-3">
                           <label for="message-text" class="col-form-label"></label>
                           <textarea wire:model.defer="opcion" name="opcion" class="form-control" id="message-text" value=""></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>                
                  </div>
                </div>
            </form>
        </div>
      </div>
   
</div>
