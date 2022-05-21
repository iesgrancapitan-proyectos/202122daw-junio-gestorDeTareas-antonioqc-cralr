@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url()->previous() }}" class="btn btn-primary"><img src="/assets/img/flecha-atras.svg" ></a>
    <div class="row" id="datos">
        {{$tarea->name}}<br>
        {{$tarea->description}}<br>
        {{\Carbon\Carbon::parse($tarea->date_finally)->format('d/m/Y')}}
    </div>
    <div id="editar" style="display: none">
        <form method="post" action="{{route('editarTarea',$tarea->id)}}">
            @csrf
                <input type="hidden" name="id" value="{{Auth::id()}}" style="display: none;">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8 mb-2">
                        Nombre: <input type="text" class="form-control" name="nombre" id="nombre" value="{{$tarea->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descripcion" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8 mb-2">
                        Descripción: <textarea class="form-control" name="descripcion" id="descripcion"  >{{$tarea->description}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="finalizacion" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8 mb-2">
                        <input type="date" class="form-control" name="finalizacion" id="finalizacion">
                    </div>
                </div>
            <button type="submit" class="btn btn-primary mb-4 mt-3" >Editar</button>
            </div>
        </form>

    </div>
    <button class="btn btn-primary" id="ocultar"><img src="/assets/img/lapiz.svg"></button>
    


</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {

        $('#ocultar').on("click",function(){
            $('#datos').css("display","none");
            $('#editar').css("display","block");
            $('#ocultar').css("display","none");
        });

        if(location.href = "";)
            
    });
</script>