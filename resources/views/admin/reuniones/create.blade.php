@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('content_header')
    <h1>Crear Reunion</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.reuniones.store'])!!}
                <div class="form-group">
                    {!! Form::label('dia','Dia')!!}
                    {!! Form::text('dia',null,['class'=>'form-control', 'placeholder' => 'Ingrese el dia'])!!}
                    @error('dia')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    {!! Form::label('hora_inicio','Hora de Inicio')!!}
                    {!! Form::text('hora_inicio',null,['class'=>'form-control', 'placeholder' => 'Ingrese la hora de inicio'])!!}
                    @error('horaI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('hora_final','Hora de culminacion')!!}
                    {!! Form::text('hora_final',null,['class'=>'form-control', 'placeholder' => 'Ingrese la hora que finalizara'])!!}
                    @error('horaF')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('expositor','Expositor')!!}
                    {!! Form::text('expositor',null,['class'=>'form-control', 'placeholder' => 'Ingrese el expositor'])!!}
                    @error('expositor')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('tema','Tema')!!}
                    {!! Form::text('tema',null,['class'=>'form-control', 'placeholder' => 'Ingrese el tema'])!!}
                    @error('tema')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!!Form::submit('Crear Reunion',['class' => 'btn btn-info'])!!}
            {!! Form::close() !!}

        </div>
    </div>
@stop
