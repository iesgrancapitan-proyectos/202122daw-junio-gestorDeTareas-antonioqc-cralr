@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url()->previous() }}" class="btn btn-primary"><img src="/assets/img/flecha-atras.svg" ></a>
    <div class="card mb-3 mt-3 " id="datos">
        <div class="card-header text-center">
        <img class="me-1" id="iconocalendario" src="/assets/img/calendario.png">
        {{\Carbon\Carbon::parse($tarea->date_finally)->format('d/m/Y')}}
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">{{$tarea->name}}</h5>
            <p class="card-text"> {{$tarea->description}}</p>
            <button class="btn btn-primary" id="ocultar"><img src="/assets/img/lapiz.svg"></button>
            <button class="btn btn-primary" style="float:right;" type="button" id="addComent">Añadir Comentario</button>
            <div class="row">
                <div class="d-grid d-md-block ">
                        
                        {{-- <button class="btn btn-primary" type="button" id="buttonAddProyect">Añadir Proyecto</button> --}}
                </div>
            </div>                 
        </div>    
        
        <div class="row justify-content-center">
            <div class="text-center" id="formComment">
                <form method="post" action="{{route('addComment')}}">
                    @csrf
                    <div class="form-group row mt-3">
                        <h2>Comentario</h2>
                        <span class="boton-cerrar"><input type="button" value="X" style="margin-right: 30px;"></span>
                    </div>
                    {{-- <input type="hidden" name="id" value="{{Auth::id()}}" style="display: none;"> --}}
                    <input type="hidden" name="id_tarea" value="{{$tarea->id}}" style="display: none;">
                    
                    <div class="form-group row input-form-comments">
                        <div class="col-sm-8 mb-2 input-comments" style="width: 50%;">
                            <input type="text" class="form-control" name="nombre_comentario" id="nombre_comentario" placeholder="Nombre" required>
                        </div>
                    </div>

                    <div class="form-group row input-form-comments">
                        <div class="col-sm-8 mb-2 input-comments" style="width: 50%;">
                            <textarea class="form-control" name="desc_comentario" id="desc_comentario" placeholder="Comentario" ></textarea>
                        </div>
                    </div>                
                    <button type="submit" class="btn btn-primary mb-4 mt-3" >Añadir</button>
                    </div>
                </form>
            </div>
         </div>
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
    
    


</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {


        $('#formComment').css('display','none');

        $('#ocultar').on("click",function(){
            $('#datos').css("display","none");
            $('#editar').css("display","block");
            $('#ocultar').css("display","none");
        });


        $('#addComent').on('click', function () {
                $('#formComment').css('display','block');
                $('#addComent').css('display','none')
            });

            $('.boton-cerrar').on('click',function() {
                $('#formComment').css('display','none');
                $('#datos').css('display', 'block');
                $('#addComent').css('display','block')
            });
    });
</script>