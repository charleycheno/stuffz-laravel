<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'total',
        'payment_method',
        'shipping_method',
        'name',
        'address',
        'postal_code',
        'city',
        'tracking_number',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
