<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'retail_id',
        'path'
    ];

    public function retail()
    {
        return $this->belongsTo(Retail::class);
    }
}
