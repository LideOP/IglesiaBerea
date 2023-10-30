@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('Sweetalert2',true)

@section('content_header')
    <h1>Editar Expositor</h1>
@stop

@section('content')
@if (session('info'))
<div class = "alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
        <div class="card-body">

        {!! Form::model($expositore,['route' => ['admin.expositores.update',$expositore],'method' => 'put', 'enctype' => 'multipart/form-data'])!!}
                <div class="form-group">
                    {!! Form::label('nombre','Nombre')!!}
                    {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder' => ''])!!}
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    {!! Form::label('cargo','Cargo')!!}
                    {!! Form::text('cargo',null,['class'=>'form-control', 'placeholder' => ''])!!}
                    @error('cargo ')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('telefono','Telefono')!!}
                    {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Solo puede ingresar numeros']) !!}
                    <!-- , 'oninput' => 'this.value = this.value.replace(/[^0-9]/g, "")'  #solo ingresar numeros-->
                    @error('telefono')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!!Form::submit('Actualizar expositor',['class' => 'btn btn-info'])!!}
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