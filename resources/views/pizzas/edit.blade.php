@if (!Auth::check())
    <script>window.location.href = "{{ route('login') }}";</script>
@endif
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Pizza</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pizzas.update', $pizza->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la Pizza</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $pizza->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Pizza</button>
        <a href="{{ route('pizzas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection