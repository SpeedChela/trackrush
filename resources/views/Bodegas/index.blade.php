@extends('template.master')

@section('contenido')
<div id="wrapper">
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>Listado de Bodegas</h2>
                    <ul class="actions">
                        <li><a href="{{ route('bodegas.create') }}" class="btn btn-primary btn-lg">Nueva Bodega</a></li>
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
                                <th>Ubicación</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bodegas as $bodega)
                                <tr>
                                    <td>{{ $bodega->nombre }}</td>
                                    <td>{{ $bodega->ubicacion_completa }}</td>
                                    <td>{{ $bodega->telefono }}</td>
                                    <td>{{ $bodega->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $bodega->estado_actual == 'Activa' ? 'success' : 'danger' }}">
                                            {{ $bodega->estado_actual }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('bodegas.read', $bodega->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('bodegas.edit', $bodega->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('bodegas.destroy', $bodega->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta bodega?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $bodegas->links() }}
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