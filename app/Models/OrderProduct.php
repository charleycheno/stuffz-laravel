<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    // Defines which attributes are mass assignable

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price_sum',
    ];

    // Creates a many-to-one relationship with orders

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Creates a many-to-one relationship with products

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
