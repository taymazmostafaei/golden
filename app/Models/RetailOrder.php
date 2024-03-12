<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'items_count',
        'full_price',
        'completed'
    ];
}
