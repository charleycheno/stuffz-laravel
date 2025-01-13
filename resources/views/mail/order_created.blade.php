<h1>Order Created</h1>
<h2>Thank you for shopping at Stuffz!</h2>
<p>Your order with order ID #{{ $order->id }} has been created successfully for user #{{ $order->user_id }}.</p>
<h3>Order details:</h3>
<ul>
  <li>Order ID: #{{ $order->id }}</li>
  <li>Order date: {{ $order->created_at }}</li>
  <li>Total price: {{ $totalPrice }}</li>
  <li>Name: {{ $order->name }}</li>
  <li>Shipping method: {{ $order->shipping_method }}</li>
  <li>Shipping address: {{ $order->address }}, {{ $order->postal_code }}, {{ $order->city }}</li>
  <li>Tracking number: {{ $order->tracking_number }}</li>
  <li>Status: {{ $order->status }}</li>
</ul>