@extends('template.master')

@section('contenido')
<div id="wrapper">
  <div id="main">
    <article class="post">
      <header>
        <div class="title">
          <h2>Listado de</h2>
          <ul class="actions">
            <li><a href="{{ route('paises.create') }}" class="btn btn-primary btn-lg">Nuevo </a></li>
          </ul>
        </div>
      </header>
      <section>
        <div class="table-wrapper">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>nombre</th>
                <th>clave</th>
                <th>estatus</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($paises as $registro)
                <tr>
                  <td>{{ $registro->id }}</td>
                  <td>{{ $registro->nombre }}</td>
                  <td>{{ $registro->clave }}</td>
                  <td>{{ $registro->estatus }}</td>
                  <td>
                    <a href="{{ route('paises.show', $registro->id) }}" class="btn btn-info btn-sm">Detalle</a>
                    <a href="{{ route('paises.edit', $registro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('paises.destroy', $registro->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este ?')">Eliminar</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <ul class="actions">
            <li><a href="{{ asset('cruds') }}" class="btn btn-secondary btn-lg">Regresar</a></li>
          </ul>
        </div>
      </section>
    </article>
  </div>
</div>
@endsection