@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('content_header')
    <h1>Registrar Expositor</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.expositores.store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
            <div class="form-group">
                    {!! Form::label('nombre','Nombre')!!}
                    {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder' => 'Ingrese el nombre del expositor'])!!}
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    {!! Form::label('cargo','Cargo')!!}
                    {!! Form::select('cargo', $opciones, null, ['class' => 'form-control', 'placeholder' => 'Ninguno']) !!}                    
                    @error('cargo ')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('telefono','Telefono')!!}
                    {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Solo puede ingresar números', 'oninput' => 'this.value = this.value.replace(/[^0-9]/g, "")', 'maxlength' => '11']) !!}
                    @error('telefono')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('foto','Foto')!!}
                    {!! Form::file('foto',null,['class'=>'form-control', 'accept' => 'image/*'])!!}
                    @error('foto')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!!Form::submit('Registrar Expositor',['class' => 'btn btn-info'])!!}
            {!! Form::close() !!}

        </div>
    </div>
@stop