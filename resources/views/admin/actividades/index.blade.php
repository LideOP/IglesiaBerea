@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('content_header')
    <h1>Actividades Principal</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-outline-primary" href="{{route('admin.actividades.create')}}">Agregar una nueva actividad</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Actividades</th>
                        <th>Lugar</th>
                        <th>Fecha</th>
                        <th>Documento</th>
                        <th colspan="4"></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($actividad as $actividade)
                    <tr>
                        <td>{{$actividade->id}}</td>
                        <td>{{$actividade->nombre}}</td>
                        <td>{{$actividade->lugar}}</td>
                        <td>{{$actividade->fecha}}</td>
                        <td>
                            <img src="{{asset($actividade->documento)}}" alt="" class="img-fluid" width="80px">
                        </td>

                        <td width="10px">
                            <button class="btn btn-info open-image" onclick="abrirVentana('{{ asset($actividade->documento) }}')">Imagen</button>
                        </td>

                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.actividades.edit', $actividade)}}">Editar</a>
                        </td>
                        
                        <td width="10px">
                            <form action="{{route('admin.actividades.destroy', $actividade)}}" method= "POST">
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
    </div>
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


<script>
    function abrirVentana(url) {
        window.open(url, '_blank', 'width=1000,height=800');
    }
</script>

@stop