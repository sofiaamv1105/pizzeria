<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('client', 'branch')->get();
        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'branch_id' => 'required|exists:branches,id',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'required|in:en_local,a_domicilio',
            'delivery_person_id' => 'nullable|exists:employees,id',
        ]);

        $order = Order::create($validated);
        return response()->json($order, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($order->load('client', 'branch'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
        ]);

        $order->update($validated);
        return response()->json($order);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order->delete();
        return response()->json(['message' => 'Pedido eliminado'], 200);
    }
}
