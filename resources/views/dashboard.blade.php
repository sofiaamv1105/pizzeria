@extends('layouts.app')

@section('content')
<style>
    .dashboard-background {
        background: url('{{ asset('images/fondo-dashboard.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        padding: 50px 0;
        min-height: 100vh;
    }

    .pizza-menu {
        width: 350px;
        background: #fff0e6;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        overflow: hidden;
        margin: 0 auto;
    }

    .pizza-menu img {
        width: 100%;
        height: auto;
        display: block;
    }

    .pizza-menu .menu-header {
        background: #d32f2f; /* rojo */
        color: white;
        font-weight: bold;
        padding: 16px;
        text-align: center;
        font-size: 1.25rem;
        letter-spacing: 1px;
    }

    .pizza-menu a {
        display: block;
        padding: 14px 20px;
        text-decoration: none;
        color: #2e7d32; /* verde */
        font-weight: 500;
        border-bottom: 1px solid #f3c2b2;
        transition: all 0.3s ease;
    }

    .pizza-menu a:hover {
        background-color: #f3c2b2;
        color: #b71c1c; /* rojo oscuro */
        padding-left: 30px;
    }

    .pizza-menu a.active {
        background-color: #c62828; /* rojo intenso */
        color: white;
        font-weight: bold;
    }
</style>

<div class="dashboard-background">
    <div class="pizza-menu">
        <img src="{{ asset('images/pizzeria.jpg') }}" alt="Pizzería">

        <div class="menu-header">Menú Principal</div>

        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>
        <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
            Usuarios
        </a>
        <a href="{{ route('pizzas.index') }}" class="{{ request()->routeIs('pizzas.*') ? 'active' : '' }}">
            Pizzas
        </a>
        <a href="{{ route('pizza_sizes.index') }}" class="{{ request()->routeIs('pizza_sizes.*') ? 'active' : '' }}">
            Tamaños de Pizza
        </a>
        <a href="{{ route('clients.index') }}" class="{{ request()->routeIs('clients.*') ? 'active' : '' }}">
            Clientes
        </a>
        <a href="{{ route('branches.index') }}" class="{{ request()->routeIs('branches.*') ? 'active' : '' }}">
            Sucursales
        </a>
        <a href="{{ route('employees.index') }}" class="{{ request()->routeIs('employees.*') ? 'active' : '' }}">
            Empleados
        </a>
        <a href="{{ route('orders.index') }}" class="{{ request()->routeIs('orders.*') ? 'active' : '' }}">
            Pedidos
        </a>
        <a href="{{ route('ingredients.index') }}" class="{{ request()->routeIs('ingredients.*') ? 'active' : '' }}">
            Ingredientes
        </a>
    </div>
</div>
@endsection
