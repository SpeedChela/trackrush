@extends('template.master')

@section('contenido')
<div id="wrapper">
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>Listado de Conductores</h2>
                    <ul class="actions">
                        <li><a href="{{ route('drivers.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus"></i> Nuevo Conductor
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
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Licencia</th>
                                <th>Vehículo Asignado</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $driver)
                                <tr>
                                    <td>{{ $driver->nombre }}</td>
                                    <td>{{ $driver->telefono }}</td>
                                    <td>{{ $driver->licencia }}</td>
                                    <td>{{ $driver->vehiculo ? $driver->vehiculo->placa : 'Sin asignar' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $driver->estado_actual == 'Activo' ? 'success' : 'danger' }}">
                                            {{ $driver->estado_actual }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('drivers.read', $driver->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este conductor?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $drivers->links() }}
                    </div>

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