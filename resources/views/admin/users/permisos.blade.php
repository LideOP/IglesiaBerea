@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Administracion de Permisos</h1>
@stop

@section('content')
    <p></p>
    <div class="card">
        @php
            if(session()){
                if(session('message')=='ok'){
                    echo'<x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
                            Permiso eliminado con éxito..!
                        </x-adminlte-alert>';   
                }
            }
        @endphp
    </div>

    <div class="card">

        <div class="card-header">
            <x-adminlte-button label="Nuevo" theme="info" icon="fas fa-plus" class="float-right" data-toggle="modal" data-target="#crearPermiso"/>
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
                @foreach ($permisos as $permiso)
                    <tr>
                        <td>{{ $permiso->id }}</td>
                        <td>{{ $permiso->name }}</td>

                         <td> {{-- <a data-toggle="modal" data-target="#editarPermiso" class="btn btn-xs btn-default text-primary">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a> --}}
                            <form style="display: inline" action="{{ route('admin.permisos.destroy',$permiso->id) }}" method="post" class="formEliminar">
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

<x-adminlte-modal id="crearPermiso" title="Nuevo Permiso" theme="info" icon="fas fa-plus" size="lg" disable-animation>

    <form action="{{ route('admin.permisos.store') }}" method="post">
        @csrf

        <div class="row">
            <x-adminlte-input name="permiso" label="Permiso" placeholder=" escriba el permiso" fgroup-class="col-md-6" disable-feedback/>
        </div>
        <x-adminlte-button type="submmit" label="Guardar" theme="info" icon="fas fa-key"/>
    </form>
</x-adminlte-modal>


@stop 
