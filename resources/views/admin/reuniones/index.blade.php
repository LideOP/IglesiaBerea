@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('content_header')
    <h1>Lista de reuniones</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">

        @role('Administrador')
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <a class="btn btn-primary btn-lg mr-2" href="{{route('admin.reuniones.create')}}">Agregar una nueva reunión</a>
            </div>
            <form action="{{route('admin.filtrarDia')}}" method="GET" class="form-inline">
                @csrf
                <label class="mr-2" for="filtroDia">Selecciona un dia:</label>
                <select class="form-control mr-2" name="filtroDia" id="filtroDia">
                    <option value="lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miercoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                    <option value="Sabado">Sábado</option>
                    <option value="Domingo">Domingo</option>
                </select>
                <button type="submit" class="btn btn-info btn-lg">Filtrar</button>
            </form>
        </div>


        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Día</th>
                        <th>Hora Inicio</th>
                        <th>Hora Final</th>
                        <th>Expositor</th>
                        <th>Tema</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reuniones as $reunion)
                        <tr>
                            <td>{{$reunion->dia}}</td>
                            <td>{{substr($reunion->hora_inicio,0,5)}}</td>
                            <td>{{substr($reunion->hora_final,0,5)}}</td>
                            <td>{{$reunion->expositores->nombre}}</td>
                            <td>{{$reunion->tema}}</td>
                        
                            @role(['Administrador','Secretario'])
                        <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.reuniones.edit', $reunion)}}">Editar</a>
                            </td>
                            @endrole
                        
                            @role('Administrador')
                        <td width="10px">
                                <form action="{{route('admin.reuniones.destroy', $reunion)}}" method= "POST">
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
