@extends('adminlte::page')
      
@section('title', 'Iglesia Berea')
@section('content_header')
    <h1>Pagina Principal Publica</h1>
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/galeria.css') }}">

<div class="Img">
    <h1>IGLESIA BIBLICA BEREA public</h1>
    <div class="galeria">
        <img src="{{ asset('/img/igle.webp') }} "alt="">
        <img src="{{ asset('/img/jovenes.webp') }} " alt="">
        <img src="{{ asset('/img/1.webp') }} " alt="">
        <img src="{{ asset('/img/2.webp') }} " alt="">
        <img src="{{ asset('/img/3.webp') }} " alt="">
    </div>
</div>
@stop
