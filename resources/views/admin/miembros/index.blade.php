@extends('adminlte::page')

@section('title', 'Miembros')

@section('content_header')
    <h1> Gestion de Miembros IGLESIA BEREA</h1>
@stop

@section('content')

@if (session('info'))
<div class = "alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif

    <div class="card">

    
        @role('Administrador')
            <div class="card-header">
                <a class="btn btn-info btn-lg float-right h-10 " href="{{route('admin.miembros.create')}}"><i class="fas fa-plus mb-1 mt-1 mr-2"></i>Registrar</a>
            </div>
        @endrole

    <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>CI</th>
                        <th>teléfono</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Direccion</th>
                        <th colspan="5"></th>
                    </tr> 

                </thead>
                <tbody>
                    @foreach ($miembros as $miembro)
                    <tr>
                        <td>{{$miembro->id}}</td>
                        <td>{{$miembro->nombre}}</td>
                        <td>{{$miembro->apellidos}}</td>
                        <td>{{$miembro->ci}}</td>
                        <td>{{$miembro->telefono}}</td>
                        <td>{{$miembro->fecha_nac}}</td>
                        <td>{{$miembro->direccion}}</td>
                    
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.miembros.edit', $miembro)}}">Editar</a>
                        </td>
                        
                        <td width="10px">
                            <form action="{{route('admin.miembros.destroy', $miembro)}}" method= "POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
@stop 

