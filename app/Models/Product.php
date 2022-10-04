<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'image',
        'desc',
        'price',
        'sale_price',
        'quantity',
        'category_id',
    ];
}
