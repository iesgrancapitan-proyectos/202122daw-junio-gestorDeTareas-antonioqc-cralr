@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="d-grid gap-2 d-md-block ">
            <button class="btn btn-primary" type="button" id="buttonAddTask">+ Crear Tarea</button>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="text-center" id="allTasks">
            @foreach ($tareas as $tarea)
            <ul>

                <li>{{$tarea->name}}</li>
                {{-- <li>{{$tarea->description}}</li>
                <li>{{$tarea->date_finally}}</li> --}}

                <li class="list-unstyled">{{$tarea->name}}</li>
                <hr></hr>
                <div class="infotarea">
                    <div class="infotarea list-unstyled">{{$tarea->description}}</div>
                    <div class="infotarea list-unstyled">{{$tarea->date_finally}}</div>
                </div>

            </ul>
            @endforeach
        </div>
    </div>


    {{-- Formulario creación tareas --}}
    <div class="row justify-content-center">
        <div class="text-center" id="divTask">
            <form method="post" action="{{route('crearTarea')}}">
                @csrf
                <span class="boton-cerrar"><input type="button" value="X"></span>
                <input type="hidden" name="id" value="{{Auth::id()}}" style="display: none;">
                <label for="nombre">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="inputsTask" required>
                </label><br>
                <label for="descripcion" class="mt-4">
                    <input type="text" name="descripcion" id="descripcion" placeholder="Descripción" class="inputsTask" required>
                </label><br>
                <label for="finalizacion" class="mt-4">
                    <input type="date" name="finalizacion" id="finalizacion" placeholder="Fecha Finalización" class="inputsTask" required>
                </label><br>
                <button type="submit" class="btn btn-primary mb-4 mt-3" >Añadir Tarea</button>
            </form>
        </div>
    </div>


</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {
            $('#buttonAddTask').on('click', function () {
                $('#divTask').css('display','block');
                $('#allTasks').css('display','none');
            });

            $('.boton-cerrar').on('click',function() {
                $('#divTask').css('display','none');
                $('#allTasks').css('display','block');
            });
            
            $('.infotarea').css('display','none');
            
            $('.tareaName').on('click', function () {
                $('.infotarea').css('display','block');
            });
            $('#nombre, #descripcion, #finalizacion').val("");
    });


</script>



