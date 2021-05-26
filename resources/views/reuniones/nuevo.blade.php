<form action="{{route('grabarReunion')}}" method="POST">
    @csrf
    <input class="form-control" type="text" placeholder="{{$nombreAdmin}}" aria-label="Disabled input example" disabled>
    <input class="form-control" type="text" placeholder="{{$nombreComunidad}}" aria-label="Disabled input example" disabled>
    <input type="hidden" name="administrator_id" value="{{$administrator_id}}">
    <input type="hidden" name="comunidad_id" value="{{$comunidad_id}}">
    <div class="form-floating mb-3">
      <label for="fecha" class="form-label">Fecha de la reunión</label>
      <input name="fecha" type="date" class="form-control" id="fecha" aria-describedby="fecha de la reunión">      
    </div>
    <div class="form-floating mb-3">
      <label for="descripcion" class="form-label">Descripción o Título de la reunión</label>
      <input name = "descripcion" type="textarea" class="form-control" id="descripcion" size="50">
    </div>    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>