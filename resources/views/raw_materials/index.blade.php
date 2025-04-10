<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Materias Primas</title>
  </head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Menu Principal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav">
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm" type="submit">Cerrar sesión</button>
          </form>
        </li>
      </ul>
    </div>
</nav>
  <body>
    <div class="container mt-4">
      <h1>Listado de Materias Primas</h1>
      <a href="{{ route('raw_materials.create') }}" class="btn btn-success mb-3">Agregar</a>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Unidad</th>
            <th>Stock Actual</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rawMaterials as $raw)
          <tr>
            <th scope="row">{{ $raw->id }}</th>
            <td>{{ $raw->name }}</td>
            <td>{{ $raw->unit }}</td>
            <td>{{ $raw->current_stock }}</td>
            <td>
              <a href="{{ route('raw_materials.edit', $raw->id) }}" class="btn btn-info">Editar</a>
              <form action="{{ route('raw_materials.destroy', $raw->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Eliminar">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>