@if (!Auth::check())
    <script>window.location.href = "{{ route('login') }}";</script>
@endif
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('pizzas.index') }}">Pizzas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('pizza_sizes.index') }}">Tamaños</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('clients.index') }}">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('branches.index') }}">Sucursales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('employees.index') }}">Empleados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('orders.index') }}">Pedidos</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm" type="submit">Cerrar sesión</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <body>
    <div class="container mt-4">
      <h1>Listado de Usuarios</h1>
      
      <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Agregar Usuario</a>

      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Rol</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td>
              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Editar</a>

              <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger btn-sm" type="submit" value="Eliminar" onclick="return confirm('¿Eliminar usuario?')">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>
