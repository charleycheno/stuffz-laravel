<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Allows a factory to generate dummy data

    use HasFactory;

    // Defines which attributes are mass assignable

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'color',
        'size',
        'type',
        'price',
    ];

    public $timestamps = false;
}
