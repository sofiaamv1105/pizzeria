<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Editar Ingrediente Extra</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
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
  <h1>Editar Ingrediente Extra</h1>
  <form method="POST" action="{{ route('extra_ingredients.update', $extraIngredient->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Nombre</label>
      <input type="text" name="name" class="form-control" value="{{ $extraIngredient->name }}" required>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Precio</label>
      <input type="number" name="price" step="0.01" class="form-control" value="{{ $extraIngredient->price }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>
</div>
</body>
</html>