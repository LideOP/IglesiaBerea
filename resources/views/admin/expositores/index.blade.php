@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('content_header')
    <h1>Lista de Expositores</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        @role('Administrador')
        <div class="card-header">
            <a class="btn btn-primary btn-sn" href="{{route('admin.expositores.create')}}">Agregar una nueva reunion</a>
        </div>
        @endrole
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Telefono</th>
                        <th colspan="3"></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($expositor as $expo)
                    <tr>
                        <td>{{$expo->nombre}}</td>
                        <td>{{$expo->cargo}}</td>
                        <td>{{$expo->telefono}}</td>

                        @role(['Administrador','Secretario'])
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.expositores.edit', $expo)}}">Editar</a>
                        </td>
                        @endrole
                        @role('Administrador')
                        <td width="10px">
                            <form action="{{route('admin.expositores.destroy', $expo)}}" method= "POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                        @endrole
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop