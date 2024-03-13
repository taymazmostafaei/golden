<?php

namespace App\Models;

use App\Casts\JalaliDate;
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

    protected $casts = [
        'created_at' => JalaliDate::class.':Y/m/d', 
        'updated_at' => JalaliDate::class.':Y/m/d',
    ];

    public function details()
    {
        return $this->hasMany(RetailOrderDetail::class);
    }

    public function fullPriceFormated(){
        return number_format($this->full_price);
    }
}
