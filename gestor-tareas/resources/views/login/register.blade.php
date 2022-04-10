<!DOCTYPE html>
@extends('layout')

@section('content')

    <div class="container">
        <h1 class="text-center">Registro</h1>
        <form action="/doregister" method="POST">
            @csrf
            <div class="form-group row mt-5">
              <label for="usuario" class="col-form-label">Usuario</label>
              <div class="">
                <input name="usuario" type="text" class="form-control" id="usuario">
              </div>

              <label for="correo" class="col-form-label">Correo electrónico</label>
              <div class="">
                <input name="correo" type="text" class="form-control" id="correo">
              </div>

           {{--    <label for="correo_verificado" class="col-form-label">Verificar correo electrónico</label>
              <div class="">
                <input name="correo_verificado" type="text" class="form-control" id="correo_verificado">
              </div> --}}

              <label for="contraseña" class="col-form-label">Contraseña</label>
              <div class="">
                <input name="contraseña" type="text" class="form-control" id="contraseña">
              </div>


            </div>
            
          
            <div class="form-group row">
              <div class="col-sm-5 mt-5">
                <button type="submit" class="btn btn-primary">Registrarse</button>
              </div>
            </div>
          </form>

    </div>
  @endsection