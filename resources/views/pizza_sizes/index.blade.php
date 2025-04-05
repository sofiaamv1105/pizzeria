@extends('layouts.app')

@section('content')
    <h1 class="text-2xl mb-4">Tamaños de Pizza</h1>

    <a href="{{ route('pizza_sizes.create') }}" class="btn btn-primary mb-4">Agregar tamaño</a>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Pizza</th>
                <th>Tamaño</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pizzaSizes as $size)
                <tr>
                    <td>{{ $size->pizza->name }}</td>
                    <td>{{ ucfirst($size->size) }}</td>
                    <td>${{ $size->price }}</td>
                    <td>
                        <a href="{{ route('pizza_sizes.edit', $size) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('pizza_sizes.destroy', $size) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
