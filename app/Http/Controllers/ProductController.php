<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'color' => $request->color,
            'size' => $request->size,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        $result = $product->save();

        if($result) {
            return response()->json([
                'message' => 'Product created successfully',
            ], 201);
        } else {
            return response()->json([
                'message' => 'Failed to create product',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Product::destroy($id);

        if($result) {
            return response()->json([
                'message' => 'Product deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to delete product',
            ], 400);
        }
    }
}
