@extends('adminlte::page')

@section('title', 'Iglesia Berea')

@section('Sweetalert2',true)

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
            <a class="btn btn-primary btn-sn" href="{{route('admin.expositores.create')}}">Agregar una nuevo Expositor</a>
        </div>
        @endrole
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Telefono</th>
                        <th>Foto</th>

                        <th colspan="3"></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($expositor as $expo)
                    <tr>
                        <td>{{$expo->nombre}}</td>
                        <td>{{$expo->cargo}}</td>
                        <td>{{$expo->telefono}}</td>
                        <td>
                        <img src="{{asset($expo->foto)}}" alt="" class="img-fluid" width="50px">
                        </td>

                        <td width="10px">
                        <button class="btn btn-info open-image" onclick="abrirVentana('{{ asset($expo->foto) }}')">Imagen</button>
                        </td>

                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.expositores.edit', $expo)}}">Editar</a>
                        </td>
                        
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
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


<script>
    function abrirVentana(url) {
        window.open(url, '_blank', 'width=1000,height=800');
    }
</script>

@stop