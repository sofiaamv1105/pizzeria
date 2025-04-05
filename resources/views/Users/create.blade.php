@if (!Auth::check())
    <script>window.location.href = "{{ route('login') }}";</script>
@endif
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Crear Usuario</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="role" class="form-control" id="role-select" required>
                <option value="">Seleccione</option>
                <option value="cliente">Cliente</option>
                <option value="empleado">Empleado</option>
            </select>
        </div>

        {{-- Campos cliente --}}
        <div id="client-fields" style="display:none;">
            <div class="mb-3">
                <label>Dirección</label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="phone" class="form-control">
            </div>
        </div>

        {{-- Campos empleado --}}
        <div id="employee-fields" style="display:none;">
            <div class="mb-3">
                <label>Posición</label>
                <select name="position" class="form-control">
                    <option value="">Seleccione</option>
                    <option value="cajero">Cajero</option>
                    <option value="administrador">Administrador</option>
                    <option value="cocinero">Cocinero</option>
                    <option value="mensajero">Mensajero</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Identificación</label>
                <input type="text" name="identification_number" class="form-control">
            </div>
            <div class="mb-3">
                <label>Salario</label>
                <input type="number" step="0.01" name="salary" class="form-control">
            </div>
            <div class="mb-3">
                <label>Fecha de Contratación</label>
                <input type="date" name="hire_date" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
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
