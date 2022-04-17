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
                <li>{{$tarea->description}}</li>
                <li>{{$tarea->date_finally}}</li>
            </ul>
            @endforeach
        </div>
    </div>


    {{-- Formulario creación tareas --}}
    <div class="row justify-content-center">
        <div class="text-center" id="divTask">
            <form method="post" action="{{route('crearTarea')}}">
                @csrf
                <input type="hidden" name="id" value="{{Auth::id()}}" style="display: none;">
                <label for="nombre">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="inputsTask">
                </label><br>
                <label for="descripcion" class="mt-4">
                    <input type="text" name="descripcion" id="descripcion" placeholder="Descripción" class="inputsTask">
                </label><br>
                <label for="finalizacion" class="mt-4">
                    <input type="date" name="finalizacion" id="finalizacion" placeholder="Fecha Finalización" class="inputsTask">
                </label><br>
                <button id="addTask" class="btn btn-primary mt-4 mb-3">Añadir Tarea</button>
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

            $('#addTask').on('click', function () {
                $('#divTask').css('display','none');
                $('#allTasks').css('display','block');
            });


        });


</script>



