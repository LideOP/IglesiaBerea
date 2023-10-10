@extends('adminlte::page')
      
@section('title', 'Iglesia Berea')
@section('content_header')
    <h1>Pagina Principal </h1>
@stop

@section('content')
<!-- @vite(['resources/css/galeria.css']) -->
<div class="Img">
    <h1>IGLESIA BIBLICA BEREA lide</h1>
    <div class="img-rigth">

        <img src="{{ asset('/logo/igle.webp') }} " alt ="">
        <img src="{{ asset('/logo/jovenes.webp') }} "  alt ="">
    </div>
</div>
@stop
