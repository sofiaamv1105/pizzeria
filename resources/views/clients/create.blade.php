<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Agregar Cliente</title>
  </head>
  <body>
    <div class="container mt-4">
      <h1 class="mb-4">Agregar Cliente</h1>

      <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="user_id" class="form-label">Usuario</label>
          <select name="user_id" id="user_id" class="form-select" required>
            <option value="">Seleccione un usuario</option>
            @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="client_address" class="form-label">Dirección</label>
          <input type="text" name="address" class="form-control" value="{{ old('address') }}">
        </div>

        <div class="mb-3">
          <label for="client_phone" class="form-label">Teléfono</label>
          <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </body>
</html>
