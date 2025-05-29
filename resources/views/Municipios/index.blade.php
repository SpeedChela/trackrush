@extends('template.master')

@section('contenido')
<div id="wrapper">
  <div id="main">
    <article class="post">
      <header>
        <div class="title">
          <h2>Listado de {{ $titulo }}</h2>
          <ul class="actions">
            <li><a href="{{ route('municipios.create') }}" class="btn btn-primary btn-lg">Nuevo {{ $singular }}</a></li>
          </ul>
        </div>
      </header>
      <section>
        <div class="table-wrapper">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>id_entidad</th>
                <th>nombre</th>
                <th>status</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($registros as $registro)
                <tr>
                  <td>{{ $registro->id }}</td>
                  <td>{{ $registro->id_entidad }}</td>
                  <td>{{ $registro->nombre }}</td>
                  <td>{{ $registro->status }}</td>
                  <td>
                    <a href="{{ route('municipios.read', $registro->id) }}" class="btn btn-info btn-sm">Detalle</a>
                    <a href="{{ route('municipios.edit', $registro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('municipios.destroy', $registro->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este {{ $singular }}?')">Eliminar</button>
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