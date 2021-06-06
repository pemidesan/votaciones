@extends('layout.main-layout')
@section('page-title','Votar')
@section('content-area')
    <form action="{{route('grabarVoto',['email'=>$email,'encuesta_id'=>$encuesta->id])}}" method="GET">>
        @csrf
        <div class="alert alert-primary" role="alert">
            <h3>Encuesta</h3>         

            <input class="form-control" type="text"
                                        aria-label="Disabled input example" 
                                        value ="{{$encuesta->pregunta}}" readonly>

            @foreach(explode(";",$encuesta->vectorOpciones) as $vo)
                <div class="form-check">
                    <input class="form-check-input" value="{{$vo}}" type="radio" name="form_opcion" id="form_opcion">
                    <label class="form-check-label" for="flexRadioDisabled">
                      {{$vo}}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary btn-lg">VOTAR</button>
    </form>
@endsection