@if (!Auth::check())
    <script>window.location.href = "{{ route('login') }}";</script>
@endif

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar Nueva Pizza</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pizzas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pizza_name" class="form-label">Nombre de la Pizza</label>
            <input type="text" name="pizza_name" id="pizza_name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Pizza</button>
        <a href="{{ route('pizzas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection