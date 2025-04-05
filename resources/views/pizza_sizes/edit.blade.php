@extends('layouts.app')

@section('content')
    <h1 class="text-2xl mb-4">Editar Tamaño de Pizza</h1>

    <form method="POST" action="{{ route('pizza_sizes.update', $pizzaSize) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pizza_id" class="block">Pizza:</label>
            <select name="pizza_id" required class="w-full border p-2 rounded">
                @foreach ($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $pizzaSize->pizza_id == $pizza->id ? 'selected' : '' }}>
                        {{ $pizza->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="size" class="block">Tamaño:</label>
            <select name="size" required class="w-full border p-2 rounded">
                @foreach (['pequeña', 'mediana', 'grande'] as $option)
                    <option value="{{ $option }}" {{ $pizzaSize->size == $option ? 'selected' : '' }}>
                        {{ ucfirst($option) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="block">Precio:</label>
            <input type="number" name="price" step="0.01" value="{{ $pizzaSize->price }}" required class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pizza_sizes.index') }}" class="btn btn-secondary ml-2">Cancelar</a>
    </form>
@endsection
