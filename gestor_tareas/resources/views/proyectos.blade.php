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
                    @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>{{$proyecto->name}}</td>
                        <td>{{$proyecto->description}}</td>
                        <td>{{$proyecto->date_finally}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary" type="button" id="buttonAddProyect">Añadir Proyecto</button>
            
        </div>
    </div>
    <br>
   
    <div class="row">           
        <div id="allProjects">
            @if(isset($busquedas))
                @foreach ($busquedas as $proyecto1)
                    @if( (\Carbon\Carbon::parse($proyecto1->date_finally))->gt(\Carbon\Carbon::now()))
                    <div class="tareas color-card text-center">
                        <div class="tarea fs-4 card-header"  id="tarea-{{$proyecto1->id}}" data-value="{{$proyecto1->id}}" data-bs-toggle="collapse" href="#collapse-{{$proyecto1->id}}" aria-expanded="false"  aria-controls="collapse-{{$proyecto1->id}}">{{$proyecto1->name}}</div>
                        <div class="collapse" id="collapse-{{$proyecto1->id}}">
                            <div class="card" >
                                <div class="card-footer text-muted"><img class="me-1" id="iconocalendario" src="/assets/img/calendario.png">{{\Carbon\Carbon::parse($proyecto1->date_finally)->format('d/m/Y')}}</div>
                                <div class="card-text mt-4 mb-4 me-4 ms-4">{{$proyecto1->description}}</div>

                                <form action="{{ route('proyecto.destroy', $proyecto1->id) }}" method ="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <div>
                                        <button class="btn" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><img src="/assets/img/eliminar.svg"></button>
                                        <a href="{{ route('verProyecto',$proyecto1->id) }}"><img src="/assets/img/view.svg"></a>
                                        <button class="btn"><img src="/assets/img/account-plus-outline.png"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                    @endif
                @endforeach
            @else
                @foreach ($proyectos as $proyecto)
                    @if( (\Carbon\Carbon::parse($proyecto->date_finally))->gt(\Carbon\Carbon::now()))
                    <div class="tareas color-card text-center">
                        <div class="tarea fs-4 card-header"  id="tarea-{{$proyecto->id}}" data-value="{{$proyecto->id}}" data-bs-toggle="collapse" href="#collapse-{{$proyecto->id}}" aria-expanded="false"  aria-controls="collapse-{{$proyecto->id}}">{{$proyecto->name}}</div>
                        <div class="collapse" id="collapse-{{$proyecto->id}}">
                            <div class="card" >
                                <div class="card-footer text-muted"><img class="me-1" id="iconocalendario" src="/assets/img/calendario.png">{{\Carbon\Carbon::parse($proyecto->date_finally)->format('d/m/Y')}}</div>
                                <div class="card-text mt-4 mb-4 me-4 ms-4">{{$proyecto->description}}</div>

                                <form action="{{ route('proyecto.destroy', $proyecto->id) }}" method ="POST" >
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <div>
                                        <button class="btn" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><img src="/assets/img/eliminar.svg"></button>
                                        <a href="{{ route('verProyecto',$proyecto->id) }}"><img src="/assets/img/view.svg"></a>
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

    <div class="row justify-content-center">
        <div class="text-center" id="formProject">
            <form method="post" action="{{route('crearProyecto')}}">
                @csrf
                <div class="form-group row mt-3">
                    <h2>Crea tu proyecto</h2>
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

          $('#buttonAddProyect').on('click', function () {
                $('#formProject').css('display','block');
                $('#allProjects').css('display',"none");
            });

            $('.boton-cerrar').on('click',function() {
                $('#formProject').css('display','none');
                $('#allProjects').css('display',"grid");
            });

            $('.descripcion, .iconos').css('display','none');
 
            $('#nombre, #descripcion, #finalizacion').val("");

            $('#today, #next').css("display","none");

            if (matchMedia('(max-width: 767px)').matches) {
                    $('.card').addClass("col-sm-12");
                    $('.card').removeClass("col-sm-6");
                    $('.proyecto').css("text-align","center");
            }
            
    });
</script>

@endsection



