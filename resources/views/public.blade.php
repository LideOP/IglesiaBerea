@extends('adminlte::page')
      
@section('title', 'Iglesia Berea')
@section('content_header')
    <h1>Pagina Principal </h1>
@stop

@section('content')
<div class="Img">
    <h1>IGLESIA BIBLICA BEREA</h1>
    <div class="image-row">
        <img src="{{ asset('/logo/igle.webp') }} " width="450" height="350">
        <img src="{{ asset('/logo/jovenes.webp') }} " width="450" height="350">
    </div>
</div>
@stop