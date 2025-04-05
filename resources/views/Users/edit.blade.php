@if (!Auth::check())
    <script>window.location.href = "{{ route('login') }}";</script>
@endif
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuario</title>
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
          <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
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
      <h2>Editar Usuario</h2>

      <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Correo Electrónico</label>
          <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Contraseña (opcional)</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
          <label for="role" class="form-label">Rol</label>
          <select name="role" id="role" class="form-select" required>
            <option value="cliente" {{ $user->role === 'cliente' ? 'selected' : '' }}>Cliente</option>
            <option value="empleado" {{ $user->role === 'empleado' ? 'selected' : '' }}>Empleado</option>
          </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </body>
</html>
