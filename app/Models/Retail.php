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
