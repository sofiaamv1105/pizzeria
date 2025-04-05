@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Menú de navegación adicional --}}
        <div class="mb-4">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Inicio</a>
        </div>
        {{-- Contenido principal --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                ¡Bienvenido al panel, {{ Auth::user()->name }}!
            </div>
        </div>
    </div>
</div>
@endsection
