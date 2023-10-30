@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Administracion de Permisos</h1>
@stop

@section('content')
    <p>hola es...... la vista de Permisos</p>

    <div class="card">

        <div class="card-header">
            <x-adminlte-button label="Nuevo" theme="primary" icon="fas fa-plus" class="float-right" data-toggle="modal" data-target="#modalPurple"/>
        </div>
        <div class="card-body">
            @php
                $heads=['ID','Nombre',['label'=> 'Actions', 'no-export'=> true, 'width' => 20]];

                $btnEdit = '';
                $btnDelete = '<button type ="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="boton delete xd">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
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
                @foreach ($permisos as $permiso)
                    <tr>
                        <td>{{ $permiso->id }}</td>
                        <td>{{ $permiso->name }}</td>

                        <td> <a href="{{route('admin.permisos.edit',$permiso)}}" class="btn btn-xs btn-default text-primary">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                            <form style="display: inline" action="{{ route('admin.permisos.destroy',$permiso) }}" method="post" class="formEliminar">
                                @csrf
                                @method('delete')
                                {!!$btnDelete!!}
                            </form>

                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>

    </div>

<x-adminlte-modal id="modalPurple" title="Nuevo Permiso" theme="primary" icon="fas fa-bolt" size="lg" disable-animation>

    <form action="{{ route('admin.permisos.store') }}" method="post">
        @csrf

        <div class="row">
            <x-adminlte-input name="nombre" label="Nombre" placeholder=" escriba el permiso" fgroup-class="col-md-6" disable-feedback/>
        </div>
        <x-adminlte-button type="submmit" label="Guardar" theme="primary" icon="fas fa-key"/>


    </form>
</x-adminlte-modal>

@stop 
