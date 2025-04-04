@if (!Auth::check())
    <script>window.location.href = "{{ route('login') }}";</script>
@endif
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Usuarios</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th><th>Email</th><th>Rol</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                <td>
            @if ($user->role === 'cliente' && $user->client)
                {{ $user->client->address }}
            @elseif ($user->role === 'empleado' && $user->employee)
                {{ $user->employee->position }}
            @else
                -
            @endif
        </td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection