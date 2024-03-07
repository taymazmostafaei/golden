<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailCategory extends Model
{
    use HasFactory;

    public function retails()
    {
        return $this->hasMany(Retail::class);
    }

    protected $fillable = [
        'name',
        'desc'
    ];
}
