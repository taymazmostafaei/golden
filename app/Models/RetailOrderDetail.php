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

    public function retail()
    {
        return $this->belongsTo(Retail::class);
    }

    public function priceFormated(){
        return number_format($this->price);
    }

}
