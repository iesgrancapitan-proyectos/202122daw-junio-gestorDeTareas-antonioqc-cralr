@extends('layouts.app')

@section('content')

<div class="container text-center">
    <body>
        <div class="primary-text-color textoinicio h1">Organiza todas tus tareas</div>
        <a href="{{ route('register') }}"><button class="btn btn-primary">Regístrate</button></a>
        <br>
        <img class="w-50" src="../img/imageninicio.png" alt="" srcset="">
    </body>
</div>
@endsection