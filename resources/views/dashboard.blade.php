<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Menú de navegación adicional --}}
            <div class="mb-4">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Inicio</a>

                @if(Auth::user()->role === 'administrador')
                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Gestión de Usuarios</a>
                @endif

                {{-- Agrega más accesos según los roles --}}
            </div>

            {{-- Contenido principal --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    ¡Bienvenido al panel, {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
