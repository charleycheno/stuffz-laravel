<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderProduct::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderProduct = new OrderProduct();
        $orderProduct->fill($request->all());
        $result = $orderProduct->save();

        if($result) {
            return response()->json([
                'message' => 'Order product created successfully',
            ], 201);
        } else {
            return response()->json([
                'message' => 'Failed to create order product',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return OrderProduct::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderProduct = OrderProduct::find($id);
        $orderProduct->fill($request->all());
        $result = $orderProduct->save();

        if($result) {
            return response()->json([
                'message' => 'Order product updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to update order product',
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderProduct = OrderProduct::find($id);
        $result = $orderProduct->delete();

        if($result) {
            return response()->json([
                'message' => 'Order product deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to delete order product',
            ], 400);
        }
    }
}
