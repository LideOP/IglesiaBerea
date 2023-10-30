@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('content_header')
    <h1>Crear Evento</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.talleres.store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
                <div class="form-group">
                    {!! Form::label('titulo_taller','Taller')!!}
                    {!! Form::text('titulo_taller',null,['class'=>'form-control', 'placeholder' => 'Ingrese el titulo del taller'])!!}
                    @error('taller')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    {!! Form::label('titulo_conferencia','Conferencia')!!}
                    {!! Form::text('titulo_conferencia',null,['class'=>'form-control', 'placeholder' => 'Ingrese el titulo de la conferencia'])!!}
                    @error('conferencia ')
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
                    {!! Form::label('documento','Documento')!!}
                    {!! Form::file('documento',null,['class'=>'form-control'])!!}
                    @error('tema')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!!Form::submit('Crear Evento',['class' => 'btn btn-info'])!!}
            {!! Form::close() !!}

        </div>
    </div>
@stop