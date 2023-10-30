@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('Sweetalert2',true)

@section('content_header')
    <h1>Editar Evento</h1>
@stop

@section('content')
@if (session('info'))
<div class = "alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
        <div class="card-body">

        {!! Form::model($tallere,['route' => ['admin.talleres.update',$tallere],'method' => 'put', 'enctype' => 'multipart/form-data'])!!}
                <div class="form-group">
                    {!! Form::label('titulo_taller','Taller')!!}
                    {!! Form::text('titulo_taller',null,['class'=>'form-control', 'placeholder' => 'Ingrese el titulo del taller'])!!}
                    @error('titulo_taller')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    {!! Form::label('titulo_conferencia','Conferencia')!!}
                    {!! Form::text('titulo_conferencia',null,['class'=>'form-control', 'placeholder' => 'Ingrese el titulo de la conferencia'])!!}
                    @error('titulo_conferencia ')
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
                    {!! Form::label('lugar','Lugar')!!}
                    {!! Form::text('lugar',null,['class'=>'form-control', 'placeholder' => 'Ingrese el lugar'])!!}
                    @error('lugar')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('documento', 'Documento (Nuevo)') !!}
                    {!! Form::file('documento', ['class' => 'form-control']) !!}
                </div>
                @error('documento')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!!Form::submit('Actualizar Evento',['class' => 'btn btn-info'])!!}
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