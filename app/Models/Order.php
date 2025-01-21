<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Defines which attributes are mass assignable

    protected $fillable = [
        'user_id',
        'status',
        'payment_id',
        'shipping_method',
        'name',
        'address',
        'postal_code',
        'city',
        'tracking_number',
    ];

    // Creates a many-to-one relationship with users

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
    // Creates a one-to-many relationship with order products

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
