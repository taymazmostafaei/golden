<?php

namespace App\Models;

use App\Casts\JalaliDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Melted extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'price',
        'amount',
        'grams',
        'type'
    ];

    protected $casts = [
        'created_at' => JalaliDate::class.':Y/m/d', 
        'updated_at' => JalaliDate::class.':Y/m/d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
