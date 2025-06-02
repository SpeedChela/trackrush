@extends('template.master')

@section('contenido')
<div id="wrapper">
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>Listado de Rutas</h2>
                    <ul class="actions">
                        <li><a href="{{ route('rutas.create') }}" class="btn btn-primary btn-lg">Nueva Ruta</a></li>
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
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Vehículo</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rutas as $ruta)
                                <tr>
                                    <td>{{ $ruta->codigo }}</td>
                                    <td>{{ $ruta->origen->nombre }}</td>
                                    <td>{{ $ruta->destino->nombre }}</td>
                                    <td>{{ $ruta->vehiculo ? $ruta->vehiculo->placa : 'Sin asignar' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $ruta->estado_actual == 'Activa' ? 'success' : 'danger' }}">
                                            {{ $ruta->estado_actual }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('rutas.read', $ruta->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('rutas.edit', $ruta->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('rutas.destroy', $ruta->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta ruta?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $rutas->links() }}
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