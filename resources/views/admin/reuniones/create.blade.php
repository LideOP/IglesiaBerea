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
                    {!! Form::select('dia', $opciones, null, ['class' => 'form-control', 'placeholder' => 'Selecciona un dia']) !!}                    
                    
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
                    {!! Form::label('expositor_id','Expositor')!!}
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            {!! Form::select('expositor_id', $expo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un expositor']) !!}
                        </div>
                        <div class="col-md-8 col-lg-4">
                            <a class="btn btn-info btn-sm w-100" href="{{ route('admin.expositores.create') }}"style="height: 38px;">Agregar nuevo Expositor</a>
                        </div>
                        @error('expositor_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                    </div>

                   
                    
                </div>

                <div class="form-group">
                    {!! Form::label('tema','Tema')!!}
                    {!! Form::text('tema',null,['class'=>'form-control', 'placeholder' => 'Ingrese el tema'])!!}
                    @error('tema')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!!Form::submit('Crear Reunion',['class' => 'btn btn-info'])!!}
            <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->

        </div>
    </div>
@stop
