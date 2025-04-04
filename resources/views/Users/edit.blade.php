@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Usuario</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label>Contraseña (dejar en blanco si no se va a cambiar)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="role" class="form-control" id="role-select" required>
                <option value="cliente" {{ $user->role === 'cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="empleado" {{ $user->role === 'empleado' ? 'selected' : '' }}>Empleado</option>
            </select>
        </div>

        {{-- Campos cliente --}}
        <div id="client-fields" style="{{ $user->role === 'cliente' ? '' : 'display:none;' }}">
            <div class="mb-3">
                <label>Dirección</label>
                <input type="text" name="address" class="form-control" value="{{ $user->client->address ?? '' }}">
            </div>
            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="phone" class="form-control" value="{{ $user->client->phone ?? '' }}">
            </div>
        </div>

        {{-- Campos empleado --}}
        <div id="employee-fields" style="{{ $user->role === 'empleado' ? '' : 'display:none;' }}">
            <div class="mb-3">
                <label>Posición</label>
                <select name="position" class="form-control">
                    @foreach(['cajero', 'administrador', 'cocinero', 'mensajero'] as $pos)
                        <option value="{{ $pos }}" {{ ($user->employee->position ?? '') === $pos ? 'selected' : '' }}>{{ ucfirst($pos) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Identificación</label>
                <input type="text" name="identification_number" class="form-control" value="{{ $user->employee->identification_number ?? '' }}">
            </div>
            <div class="mb-3">
                <label>Salario</label>
                <input type="number" step="0.01" name="salary" class="form-control" value="{{ $user->employee->salary ?? '' }}">
            </div>
            <div class="mb-3">
                <label>Fecha de Contratación</label>
                <input type="date" name="hire_date" class="form-control" value="{{ $user->employee->hire_date ?? '' }}">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    document.getElementById('role-select').addEventListener('change', function () {
        const role = this.value;
        document.getElementById('client-fields').style.display = (role === 'cliente') ? 'block' : 'none';
        document.getElementById('employee-fields').style.display = (role === 'empleado') ? 'block' : 'none';
    });
</script>
@endsection
