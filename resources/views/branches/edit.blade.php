<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Sucursal</title>
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
      <h1>Editar Sucursal</h1>
      <form action="{{ route('branches.update', $branch->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" name="name" class="form-control" value="{{ $branch->name }}" required>
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Dirección</label>
          <input type="text" name="address" class="form-control" value="{{ $branch->address }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </body>
</html>
