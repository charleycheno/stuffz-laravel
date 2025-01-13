<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $request->validate([
            'shipping_method' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'products' => 'required|array',
            'products.*.product_id' => 'required|integer',
            'products.*.quantity' => 'required|integer',
        ]);

        $order = new Order();
        
        $order->fill($request->all());
        $order->user_id = Auth::id();
        $order->status = 'pending';
        $order->tracking_number = uniqid();
        $result = $order->save();

        $orderProducts = $request->products;
        
        foreach($orderProducts as $i) {
            $orderProduct = new OrderProduct();
            $orderProduct->fill($i);
            $orderProduct->order_id = $order->id;
            $product = Product::find($i['product_id']);
            $orderProduct->price_sum = $product->price * $i['quantity'];
            $orderProduct->save();
        }

        $totalPrice = Order::find($order->id)->orderProducts->sum('price_sum');
        $totalPrice = number_format((float)$totalPrice, 2, '.', '');

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey(env('MOLLIE_API_KEY', null));

        $payment = $mollie->payments->create([
          "amount" => [
              "currency" => "EUR",
              "value" => $totalPrice,
          ],
          "description" => "Order #{$order->id}",
          "redirectUrl" => env("FRONTEND_URL")."/orders/{$order->id}",
        ]);

        $order->payment_id = $payment->id;
        $order->save();

        Mail::to($request->user())->send(new OrderCreated($order, $orderProducts, $totalPrice));
        
        if($result) {
            return response()->json([
                'message' => 'Order created successfully',
                'payment_url' => $payment->getCheckoutUrl(),
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
