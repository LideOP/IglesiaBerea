@extends('adminlte::page')

@section('title', 'Editar')

@section('Sweetalert2', true)

@section('content_header')
    <h1>Editar Miembro</h1>
@stop

@section('content')
@if(session('info'))
<div class="Alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
    <div  class="card-body">
        {!! Form::model($miembro, ['route' => ['admin.miembros.update',$miembro],'method'=>'put'])!!}

            <div class="form-group">
                {!! Form::label('nombre','Nombre')!!}
                {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder' => 'Ingrese nombre'])!!}
                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror    
            </div>

            <div class="form-group">
                {!! Form::label('apellidos','Apellidos')!!}
                {!! Form::text('apellidos',null,['class'=>'form-control', 'placeholder' => 'Ingrese Apellidos'])!!}
                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror    
            </div>

            <div class="form-group">
                {!! Form::label('ci','Ci')!!}
                {!! Form::number('ci',null,['class'=>'form-control', 'placeholder' => 'Ingrese su CI'])!!}
                @error('ci')
                    <span class="text-danger">{{$message}}</span>
                @enderror    
            </div>
            <div class="form-group">
                {!! Form::label('telefono','Telefono')!!}
                {!! Form::tel('telefono',null,['class'=>'form-control', 'placeholder' => 'Ingrese Telefono'])!!}
                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror    
            </div>
            <div class="form-group">
                {!! Form::label('fech_nac','Fecha de Nacimiento')!!}
                {!! Form::date('fecha_nac',null,['class'=>'form-control', 'placeholder' => 'Ingrese Fecha'])!!}
                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror    
            </div>

            <div class="form-group">
                {!! Form::label('direccion','Direccion')!!}
                {!! Form::text('direccion',null,['class'=>'form-control', 'placeholder' => 'Ingrese su direccion'])!!}
                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror    
            </div>
            {!!Form::submit('Actualizar Datos',['class' => 'btn btn-info'])!!}

        {!! Form::close() !!}
    </div>

</div>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop