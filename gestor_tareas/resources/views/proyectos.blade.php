@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="d-grid d-md-block ">
                <button class="btn btn-primary" type="button" id="buttonAddProyect">Añadir Proyecto</button>
        </div>
    </div>
    <br>

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
            });

            $('.boton-cerrar').on('click',function() {
                $('#formProject').css('display','none');
            });
            
    });
</script>



