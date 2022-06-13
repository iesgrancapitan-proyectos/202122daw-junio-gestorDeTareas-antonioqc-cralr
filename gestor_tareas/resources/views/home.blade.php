@extends('layouts.app')

@section('content')
<div class="container">

    

    <div class="row">
        
        <div class="d-grid d-md-block ">
            <table id="prueba" style="display:none">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha finalización</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{$tarea->name}}</td>
                        <td>{{$tarea->description}}</td>
                        <td>{{$tarea->date_finally}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary" type="button" id="buttonAddTask">Añadir Tarea</button>
                {{-- <button class="btn btn-primary" type="button" id="buttonAddProyect">Añadir Proyecto</button> --}}
        </div>
    </div>
    <br>
    <div class="row">           
        <div id="allTasks">
            @if(isset($busquedas))
                @foreach($busquedas as $tarea1)
                    @if( (\Carbon\Carbon::parse($tarea1->date_finally))->gt(\Carbon\Carbon::now()))
                    <div class="tareas color-card text-center">
                        <div class="tarea fs-4 card-header"  id="tarea-{{$tarea1->id}}" data-value="{{$tarea1->id}}" data-bs-toggle="collapse" href="#collapse-{{$tarea1->id}}" aria-expanded="false"  aria-controls="collapse-{{$tarea1->id}}">{{$tarea1->name}}</div>
                        <div class="collapse" id="collapse-{{$tarea1->id}}">
                            <div class="card" >
                                <div class="card-footer text-muted"><img class="me-1" id="iconocalendario" src="/assets/img/calendario.png">{{\Carbon\Carbon::parse($tarea1->date_finally)->format('d/m/Y')}}</div>
                                @if($tarea->description != "")
                                <div class="card-text mt-4 mb-4 me-4 ms-4">{{$tarea->description}}</div>
                                @else
                                    <div class="card-text mt-4 mb-4 me-4 ms-4">Sin descripción</div>
                                @endif
                                <form action="{{ route('tarea.destroy', $tarea1->id) }}" method ="POST" >
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <div>
                                        <button class="btn" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><img src="assets/img/eliminar.svg"></button>
                                        <a href="{{ route('verTarea',$tarea1->id) }}"><img src="assets/img/view.svg"></a>
                                        {{--< a href="#"><img src="assets/img/comentario.png"></a> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                    @endif
                @endforeach
            @else
                @foreach ($tareas as $tarea)
                    @if( (\Carbon\Carbon::parse($tarea->date_finally))->gt(\Carbon\Carbon::now()))
                        <div class="tareas color-card text-center">
                            <div class="tarea fs-4 card-header"  id="tarea-{{$tarea->id}}" data-value="{{$tarea->id}}" data-bs-toggle="collapse" href="#collapse-{{$tarea->id}}" aria-expanded="false"  aria-controls="collapse-{{$tarea->id}}">{{$tarea->name}}</div>
                            <div class="collapse" id="collapse-{{$tarea->id}}">
                                <div class="card" >
                                    <div class="card-footer text-muted"><img class="me-1" id="iconocalendario" src="/assets/img/calendario.png">{{\Carbon\Carbon::parse($tarea->date_finally)->format('d/m/Y')}}</div>
                                    @if($tarea->description != "")
                                        <div class="card-text mt-4 mb-4 me-4 ms-4">{{$tarea->description}}</div>
                                    @else
                                        <div class="card-text mt-4 mb-4 me-4 ms-4">Sin descripción</div>
                                    @endif
                                    <form action="{{ route('tarea.destroy', $tarea->id) }}" method ="POST" >
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <div>
                                            <button class="btn" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><img src="assets/img/eliminar.svg"></button>
                                            <a href="{{ route('verTarea',$tarea->id) }}"><img src="assets/img/view.svg"></a>
                                            {{--< a href="#"><img src="assets/img/comentario.png"></a> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                @endforeach
            @endif
        </div>
    </div>


    {{-- Formulario creación de las tareas --}}
    <div class="row justify-content-center">
        <div class="text-center" id="formTask">
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


</div>
@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function () {

        $('#prueba').DataTable({
            dom: 'Bfrtip',
            buttons: [
                        {extend: 'excelHtml5', title: ''},
                        'pdfHtml5',
                    ],
            "ordering": false
        });
            $('#buttonAddTask').on('click', function () {
                $('#formTask').css('display','block');
                //$('#formProject').css('display','none');
                $('#allTasks').css('display','none');
            });


            $('.boton-cerrar').on('click',function() {
                $('#formTask').css('display','none');
                //$('#formProject').css('display','none');
                $('#allTasks').css('display','grid');
            });
            
            $('.descripcion, .iconos').css('display','none');
 
            $('#nombre, #descripcion, #finalizacion').val("");

            $('#tareaHoy-'+$('#hoy').val()).on("click",function(){
                $hoy = parseInt($('#hoy').val());
                console.log($hoy);
                $tareas = document.getElementsByClassName("tarea");
                $arrayOfElements = Array.from($tareas);

                for (let i = 0; i < $arrayOfElements.length; i++) {
                    const element = $arrayOfElements[i];

                    if(element.dataset.value == $hoy){
                        $('#tarea-'+element.dataset.value).css("display","block");
                    }
                    if(element.dataset.value != $hoy){
                        $('#tarea-'+element.dataset.value).css("display","none");
                    }
                }  
            });

            //Control de css segun versión 

            if (matchMedia('(max-width: 767px)').matches) {
                    $('.card').addClass("col-sm-12");
                    $('.card').removeClass("col-sm-6");
                    $('.tarea').css("text-align","center");
            }
    });
</script>

@endsection

