<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PizzaIngredientController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('pizzas', PizzaController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/user', [UserController::class, 'create'])->name('users.create');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizzas.index');
Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');
Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');
Route::delete('/pizzas/{pizza}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');
Route::put('/pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update');
Route::get('/pizzas/{pizza}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit');

Route::get('/pizza_sizes', [PizzaSizeController::class, 'index'])->name('pizza_sizes.index');
Route::post('/pizza_sizes', [PizzaSizeController::class, 'store'])->name('pizza_sizes.store');
Route::get('/pizza_sizes/create', [PizzaSizeController::class, 'create'])->name('pizza_sizes.create');
Route::delete('/pizza_sizes/{pizza_size}', [PizzaSizeController::class, 'destroy'])->name('pizza_sizes.destroy');
Route::put('/pizza_sizes/{pizza_size}', [PizzaSizeController::class, 'update'])->name('pizza_sizes.update');
Route::get('/pizza_sizes/{pizza_size}/edit', [PizzaSizeController::class, 'edit'])->name('pizza_sizes.edit');

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create');
Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');
Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');

Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
Route::delete('/ingredients/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');
Route::put('/ingredients/{ingredient}', [IngredientController::class, 'update'])->name('ingredients.update');
Route::get('/ingredients/{ingredient}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');

Route::get('/pizza_ingredients', [PizzaIngredientController::class, 'index'])->name('pizza_ingredients.index');
Route::post('/pizza_ingredients', [PizzaIngredientController::class, 'store'])->name('pizza_ingredients.store');
Route::get('/pizza_ingredients/create', [PizzaIngredientController::class, 'create'])->name('pizza_ingredients.create');
Route::delete('/pizza_ingredients/{pizza_ingredient}', [PizzaIngredientController::class, 'destroy'])->name('pizza_ingredients.destroy');
Route::put('/pizza_ingredients/{pizza_ingredient}', [PizzaIngredientController::class, 'update'])->name('pizza_ingredients.update');
Route::get('/pizza_ingredients/{pizza_ingredient}/edit', [PizzaIngredientController::class, 'edit'])->name('pizza_ingredients.edit');
