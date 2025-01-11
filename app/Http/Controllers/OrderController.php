<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->fill($request->all());
        $result = $order->save();

        if($result) {
            return response()->json([
                'message' => 'Order created successfully',
            ], 201);
        } else {
            return response()->json([
                'message' => 'Failed to create order',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Order::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        $order->fill($request->all());
        $result = $order->save();

        if($result) {
            return response()->json([
                'message' => 'Order updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to update order',
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $result = $order->delete();

        if($result) {
            return response()->json([
                'message' => 'Order deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to delete order',
            ], 400);
        }
    }
}
