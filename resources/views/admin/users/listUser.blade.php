@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Administracion de Usuarios</h1>
@stop

@section('content')
    <p>hola es......usuarios </p>

    <div class="card">

        <div class="card-header">
            <a class="btn btn-info btn-lg float-right h-10" href="{{route('admin.users.create')}}"><i class="fas fa-plus mb-1 mt-1 mr-2"></i>Registrar</a>
        </div>

        <div class="card-body">
            @php
                $heads=['ID','Nombre',['label'=> 'Actions', 'no-export'=> true, 'width' => 20]];

                $btnEdit = '';
                $btnDelete = '<button type ="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="boton delete xd">
                                <i class="fa fa-lg fa-fw fa-trash-alt"></i>
                            </button>';
                
                $btnDetails = '<button type ="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="boton detalle xd">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>';

                $config = [
                        'language' => [
                            'url' => '//cnd.database.net/plug-ins/1.13.6/i18n/es-ES.json',  
                        ],
                    ];
            @endphp

            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>

                        <td> <a href="{{route('admin.asignar.edit',$user)}}" class="btn btn-xs btn-default text-primary">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                            <form style="display: inline" action="{{ route('admin.asignar.destroy',$user) }}" method="post" class="formEliminar">
                                @csrf
                                @method('delete')
                                {!!$btnDelete!!}
                                {!!$btnDetails!!}
                            </form>

                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
@stop 
