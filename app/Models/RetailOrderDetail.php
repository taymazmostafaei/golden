<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailOrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'retail_order_id',
        'retail_id',
        'price',
        'quantity'
    ];
}
