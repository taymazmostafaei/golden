<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retail extends Model
{
    use HasFactory;

    public function media()
    {
        return $this->hasMany(RetailMedia::class);
    }

    public function category()
    {
        return $this->hasOne(RetailCategory::class);
    }

    public function priceFormated(){
        return number_format($this->price);
    }

    protected $casts = [
        'moreoptions' => 'json',
        'hide' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'price',
        'exsist',
        'desc',
        'hide'
    ];
}
