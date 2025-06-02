@extends('template.master')

@section('contenido')
<div id="wrapper">
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>Listado de Entregas</h2>
                    <ul class="actions">
                        <li><a href="{{ route('entregas.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus"></i> Nueva Entrega
                        </a></li>
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
                                <th>ID</th>
                                <th>Paquete</th>
                                <th>Conductor</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registros as $entrega)
                                <tr>
                                    <td>{{ $entrega->id }}</td>
                                    <td>{{ $entrega->paquete->codigo }}</td>
                                    <td>{{ $entrega->driver->nombre }}</td>
                                    <td>{{ $entrega->paquete->bodegaOrigen->nombre }}</td>
                                    <td>{{ $entrega->paquete->bodegaDestino->nombre }}</td>
                                    <td>
                                        <span class="badge bg-{{ $entrega->estado_actual == 'Completada' ? 'success' : 
                                            ($entrega->estado_actual == 'En Proceso' ? 'warning' : 'info') }}">
                                            {{ $entrega->estado_actual }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('entregas.read', $entrega->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('entregas.edit', $entrega->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('entregas.destroy', $entrega->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta entrega?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if(method_exists($registros, 'links'))
                        <div class="d-flex justify-content-center">
                            {{ $registros->links() }}
                        </div>
                    @endif

                    <ul class="actions">
                        <li><a href="{{ url('/') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-arrow-left"></i> Regresar
                        </a></li>
                    </ul>
                </div>
            </section>
        </article>
    </div>
</div>
@endsection