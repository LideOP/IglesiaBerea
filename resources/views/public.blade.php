@extends('adminlte::page')
      
@section('title', 'Iglesia Berea')
@section('content_header')
@stop

@section('content')
<h1>IGLESIA BÍBLICA BEREA</h1>
<div style="text-align: center;">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/galeria.css') }}">
    <div class="Img">
        
        <div class="galeria">
            <img src="{{ asset('/img/igle.webp') }}" alt="">
            <img src="{{ asset('/img/jovenes.webp') }}" alt="">
            <img src="{{ asset('/img/1.webp') }}" alt="">
            <img src="{{ asset('/img/2.webp') }}" alt="">
            <img src="{{ asset('/img/3.webp') }}" alt="">
        </div>
    </div>
</div>
@stop
