@extends('template.master')

@section('contenido')
<div id="wrapper">
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>Listado de Paquetes</h2>
                    <ul class="actions">
                        <li><a href="{{ route('paquetes.create') }}" class="btn btn-primary btn-lg">Nuevo Paquete</a></li>
                    </ul>
                </div>
            </header>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <section>
                <div class="table-wrapper">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Peso</th>
                                <th>Dimensiones</th>
                                <th>Estado</th>
                                <th>Ruta</th>
                                <th>Bodega Origen</th>
                                <th>Bodega Destino</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paquetes as $paquete)
                                <tr>
                                    <td>{{ $paquete->codigo }}</td>
                                    <td>{{ $paquete->peso }} kg</td>
                                    <td>{{ $paquete->dimensiones }}</td>
                                    <td>{{ $paquete->estado_actual }}</td>
                                    <td>{{ $paquete->ruta_actual }}</td>
                                    <td>{{ $paquete->bodegaOrigen->nombre ?? 'No asignada' }}</td>
                                    <td>{{ $paquete->bodegaDestino->nombre ?? 'No asignada' }}</td>
                                    <td>
                                        <a href="{{ route('paquetes.read', $paquete->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('paquetes.edit', $paquete->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('paquetes.destroy', $paquete->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este paquete?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $paquetes->links() }}
                    </div>

                    <ul class="actions">
                        <li><a href="{{ url('/') }}" class="btn btn-secondary btn-lg">Regresar</a></li>
                    </ul>
                </div>
            </section>
        </article>
    </div>
</div>
@endsection