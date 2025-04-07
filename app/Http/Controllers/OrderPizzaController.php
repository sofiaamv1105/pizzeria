<?php

namespace App\Http\Controllers;

use App\Models\OrderPizza;
use App\Models\Order;
use App\Models\PizzaSize;
use Illuminate\Http\Request;

class OrderPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderPizzas = OrderPizza::with(['order', 'pizzaSize'])->get();
        return view('order_pizza.index', compact('orderPizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $pizzaSizes = PizzaSize::all();
        return view('order_pizza.create', compact('orders', 'pizzaSizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_size_id' => 'required|exists:pizza_size,id',
            'quantity' => 'required|integer|min:1',
        ]);

        OrderPizza::create($request->all());

        return redirect()->route('order_pizza.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orders = Order::all();
        $pizzaSizes = PizzaSize::all();
        return view('order_pizza.edit', compact('orderPizza', 'orders', 'pizzaSizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_size_id' => 'required|exists:pizza_size,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderPizza->update($request->all());

        return redirect()->route('order_pizza.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderPizza->delete();
        return redirect()->route('order_pizza.index');
    }
}
