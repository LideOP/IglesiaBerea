@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles y Permisos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <p>{{$role->name}}</p>

        </div>

        <div class="card-body">
            <h5>Lista de PERMISOS</h5>
            {!! Form::model($role,['route' => ['admin.roles.update',$role],'method'=> 'put']) !!}
                @foreach ($permisos as $permiso)
                <div>
                    <label>
                        {!! Form::checkbox('permisos[]',$permiso->id,$role->hasPermissionTo($permiso->id) ? : false,['class'=>'mr-1'])!!}
                        {{ $permiso->name }}
                    </label>
                </div>
                @endforeach

                {!! Form::submit('Asignar Permisos',['class'=>'btn btn-primary mt-3']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop 
