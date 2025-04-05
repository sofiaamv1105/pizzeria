@extends('layouts.app')

@section('content')
    <h1 class="text-2xl mb-4">Agregar Tamaño de Pizza</h1>

    <form method="POST" action="{{ route('pizza_sizes.store') }}">
        @csrf
        <div class="mb-3">
            <label for="pizza_id">Pizza:</label>
            <select name="pizza_id" required>
                @foreach ($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="size">Tamaño:</label>
            <select name="size" required>
                <option value="pequeña">Pequeña</option>
                <option value="mediana">Mediana</option>
                <option value="grande">Grande</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="price">Precio:</label>
            <input type="number" name="price" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
