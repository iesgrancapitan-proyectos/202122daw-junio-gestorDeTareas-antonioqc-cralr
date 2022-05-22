@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="d-grid d-md-block ">
                <button class="btn btn-primary" type="button" id="buttonAddProyect">Añadir Proyecto</button>
        </div>
    </div>
    <br>

   
    <div class="row">           
        <div id="allProjects">
            @foreach ($proyectos as $proyecto)
                @if( (\Carbon\Carbon::parse($proyecto->date_finally))->gt(\Carbon\Carbon::now()))
                <div class="proyectos">
                    <div class="proyecto mb-2 fs-4" id="proyecto-{{$proyecto->id}}" data-value="{{$proyecto->id}}" data-bs-toggle="collapse" href="#collapse-{{$proyecto->id}}" aria-expanded="false"  aria-controls="collapse-{{$proyecto->id}}">{{$proyecto->name}}</div>
                    <div class="collapse" id="collapse-{{$proyecto->id}}">
                        <div class="card card-body col-sm-6 card-w">
                            Descripción: {{$proyecto->description}}<br>
                            Fecha Finalización: {{\Carbon\Carbon::parse($proyecto->date_finally)->format('d/m/Y')}}

                            <form action="{{ route('proyecto.destroy', $proyecto->id) }}" method ="POST" >
                                @csrf
                                {{ method_field('DELETE') }}
                                <div>
                                    <button class="btn" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><img src="/assets/img/eliminar.svg"></button>
                                    {{-- <a href="#"><img src="assets/img/lapiz.svg"></a> --}}
                                    {{--< a href="#"><img src="assets/img/comentario.png"></a> --}}
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                @else
                @endif
            @endforeach
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {

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



