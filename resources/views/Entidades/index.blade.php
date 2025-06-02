@extends('template.master')

@section('contenido')
<div id="wrapper">
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>Listado de Entidades</h2>
                    <ul class="actions">
                        <li><a href="{{ route('entidades.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus"></i> Nueva Entidad
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
                                <th>Nombre</th>
                                <th>País</th>
                                <th>Municipios</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entidades as $entidad)
                                <tr>
                                    <td>{{ $entidad->id }}</td>
                                    <td>{{ $entidad->nombre }}</td>
                                    <td>{{ $entidad->pais->nombre ?? 'No especificado' }}</td>
                                    <td>{{ $entidad->municipios->count() }}</td>
                                    <td>
                                        <span class="badge bg-{{ $entidad->status ? 'success' : 'danger' }}">
                                            {{ $entidad->status ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('entidades.read', $entidad->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('entidades.edit', $entidad->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('entidades.destroy', $entidad->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta entidad?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if(method_exists($entidades, 'links'))
                        <div class="d-flex justify-content-center">
                            {{ $entidades->links() }}
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