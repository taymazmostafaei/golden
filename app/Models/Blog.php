<?php

namespace App\Models;

use App\Casts\JalaliDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => JalaliDate::class.':Y/m/d', 
        'updated_at' => JalaliDate::class.':Y/m/d',
    ];
}
