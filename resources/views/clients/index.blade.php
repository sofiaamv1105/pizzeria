<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Listado de Clientes</title>
  </head>
  <body>
    <div class="container mt-4">
      <h1 class="mb-4">Listado de Clientes</h1>

      <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Agregar Cliente</a>

      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clients as $client)
            <tr>
              <td>{{ $client->id }}</td>
              <td>{{ $client->user->name }}</td>
              <td>{{ $client->address }}</td>
              <td>{{ $client->phone }}</td>
              <td>
                <a href="{{ route('clients.edit', $client) }}" class="btn btn-info btn-sm">Editar</a>

                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
