@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="d-grid gap-2 d-md-block ">
            <button class="btn btn-primary" type="button" id="buttonAddTask">+</button>
        </div>
    </div>
    <br></br>
    <div class="row">
        <div class="text-center" id="allTasks">
            
            @php
                $total = $tareas->count();
                echo '<input type="hidden" value="'.$total.'" style="display: none;" id="totaltarea">';
            @endphp

        @foreach ($tareas as $tarea)
            <input type="hidden" name="idtarea" value="{{$tarea->id}}" style="display: none;" id="idtarea">
            <input type="hidden" name="nombretarea" value="{{$tarea->name}}" style="display: none;" id="nombretarea">
                    <div class="tarea mb-2 fs-4">{{$tarea->name}}</div>
                    <div class="descripcion mb-2" id="descripciontarea">{{$tarea->description}}</div>
                    <div class="iconos">
                        <div>{{$tarea->date_finally}}</div>
                        <div>
                            <a href=""><img src="assets/img/lapiz.svg"></a>
                            <a href=""><img src="assets/img/eliminar.svg"></a>
                            <a href=""><img src="assets/img/comentario.png"></a>
                        </div>
                    </div>
                    <hr>
            @endforeach
        </div>
    </div>


    {{-- Formulario creación tareas --}}
    <div class="row justify-content-center">
        <div class="text-center" id="divTask">
            <form method="post" action="{{route('crearTarea')}}">
                @csrf
                <div class="form-group row mt-3">
                    <h2>Crea tu tarea</h2>
                    <span class="boton-cerrar"><input type="button" value="X"></span>
                </div>
                <input type="hidden" name="id" value="{{Auth::id()}}" style="display: none;">
                
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8 mb-2">
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="descripcion" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8 mb-2">
                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción" ></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="finalizacion" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8 mb-2">
                        <input type="date" class="form-control" name="finalizacion" id="finalizacion" placeholder="Fecha Finalización" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mb-4 mt-3" >Añadir</button>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
 

            idtarea = $('#idtarea').val();
            nombreTarea = $('#nombretarea').val();
            totalTarea = $('#totaltarea').val();
            
            for(i=0;i<totalTarea;i++){
                $(".tarea").attr("id","tarea"+idtarea);
            }
            
            
            $('#buttonAddTask').on('click', function () {
                $('#divTask').css('display','block');
                $('#allTasks').css('display','none');
            });

            $('.boton-cerrar').on('click',function() {
                $('#divTask').css('display','none');
                $('#allTasks').css('display','block');
            });
            
            $('.descripcion, .iconos').css('display','none');
            
            $('#tarea'+idtarea).on('click', function () {
                $('#descripciontarea').css('display','block');
                $('.iconos').css('display','grid')
                            .css('grid-template-columns', 'repeat(2,1fr)')
            });
 
            $('#nombre, #descripcion, #finalizacion').val("");
    });

</script>



