@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('Sweetalert2',true)

@section('content_header')
    <h1>Editar Reunion</h1>
@stop

@section('content')
@if (session('info'))
<div class = "alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
        <div class="card-body">
            {!! Form::model($reunione, ['route' => ['admin.reuniones.update',$reunione],'method'=>'put'])!!}
                <div class="form-group">
                    {!! Form::label('dia','Dia')!!}
                    {!! Form::select('dia', $op, $reunione->dia, ['class' => 'form-control', 'placeholder' => 'Selecciona un dia']) !!}                    
                    @error('dia')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    {!! Form::label('hora_inicio','Hora de Inicio')!!}
                    {!! Form::text('hora_inicio',null,['class'=>'form-control', 'placeholder' => 'Ingrese la hora de inicio'])!!}
                    @error('hora_inicio')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('hora_final','Hora de culminacion')!!}
                    {!! Form::text('hora_final',null,['class'=>'form-control', 'placeholder' => 'Ingrese la hora que finalizara'])!!}
                    @error('hora_final')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
               

                <div class="form-group">
                    {!! Form::label('expositor_id','Expositor')!!}
                    {!! Form::select('expositor_id',$expo,null, ['class'=>'form-control', 'placeholder' => 'Ingrese el expositor'])!!}
                    @error('expositor_id')
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
                {!!Form::submit('Actualizar Reunion',['class' => 'btn btn-info'])!!}
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