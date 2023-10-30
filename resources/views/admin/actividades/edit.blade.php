@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('Sweetalert2',true)

@section('content_header')
    <h1>Editar Actividad</h1>
@stop

@section('content')
@if (session('info'))
<div class = "alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
        <div class="card-body">

        {!! Form::model($actividade,['route' => ['admin.actividades.update',$actividade],'method' => 'put', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
                    {!! Form::label('nombre','Actividad')!!}
                    {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder' => 'Ingrese la actividad'])!!}
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    {!! Form::label('lugar','Lugar')!!}
                    {!! Form::text('lugar',null,['class'=>'form-control', 'placeholder' => 'Ingrese el lugar'])!!}
                    @error('lugar')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('fecha','Fecha')!!}
                    {!! Form::date('fecha',null,['class'=>'form-control', 'placeholder' => 'Seleccione la Fecha'])!!}
                    @error('fecha')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('documento','Documento')!!}
                    {!! Form::file('documento',null,['class'=>'form-control'])!!}
                    @error('tema')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!!Form::submit('Actualizar Actividad',['class' => 'btn btn-info'])!!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        Console.log('Hi');
    </script>
@stop