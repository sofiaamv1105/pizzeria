@if (!Auth::check())
    <script>window.location.href = "{{ route('login') }}";</script>
@endif
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Pizzas</h1>
    
    <a href="{{ route('pizzas.create') }}" class="btn btn-primary mb-3">Agregar Nueva Pizza</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pizzas as $pizza)
                <tr>
                    <td>{{ $pizza->pizza_id }}</td>
                    <td>{{ $pizza->pizza_name }}</td>
                    <td>
                        <a href="{{ route('pizzas.edit', $pizza->pizza_id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pizzas.destroy', $pizza->pizza_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta pizza?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection