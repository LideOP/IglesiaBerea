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
                    {!! Form::label('nombre','Nombre')!!}
                    {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder' => 'Ingrese nombre evento'])!!}
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    {!! Form::label('tipo_evento','Tipo Evento')!!}
                    {!! Form::select('tipo_evento', $op, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un evento']) !!}                    
                    @error('tipo_evento ')
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
                    {!! Form::file('documento',null,['class'=>'form-control', 'accept' => 'image/*'])!!}
                    @error('tema')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                @role(['Administrador'])
                {!!Form::submit('Crear Evento',['class' => 'btn btn-info'])!!}
                @endrole
            {!! Form::close() !!}

        </div>
    </div>
@stop
