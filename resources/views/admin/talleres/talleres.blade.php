@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('content_header')
    <h1 style="text-align: center;">TALLERES</h1>
@endsection

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-lg mr-2" href="{{route('admin.talleres.create')}}">Agregar un nuevo evento</a>
            <a class="btn btn-info btn-lg mr-2" href="{{route('admin.filtroActividades')}}">Actividades</a>
            <a class="btn btn-info btn-lg mr-2" href="{{route('admin.filtroConferencias')}}">Conferencias</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Evento</th>
                        <th>Fecha</th>
                        <th>Lugar</th>
                        <th>Documento</th>
                        <th colspan="5"></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($talleres as $taller)
                    <tr>
                        <td>{{$taller->nombre}}</td>
                        <td>{{$taller->tipo_evento}}</td>
                        <td>{{$taller->fecha}}</td>
                        <td>{{$taller->lugar}}</td>
                        <td>

                            <img src="{{asset($taller->documento)}}" alt="" class="img-fluid" width="80px">
                        </td>
                        <td width="10px">
                        
                        <td width="10px">
                        <button class="btn btn-info open-image" onclick="abrirVentana('{{ asset($taller->documento) }}')">Imagen</button>

                        </td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.talleres.edit', $taller)}}">Editar</a>
                        </td>
                        
                        <td width="10px">
                            <form action="{{route('admin.talleres.destroy', $taller)}}" method= "POST">
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