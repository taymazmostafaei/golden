<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailCategory extends Model
{
    use HasFactory;
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

    public function retails()
    {
        return $this->hasMany(Retail::class);
    }

    public function getLocalKeyName()
    {
        return 'id';
    }

    public function getParentKeyName()
    {
        return 'parent_id';
    }

    protected $fillable = [
        'parent_id',
        'name',
        'desc'
    ];
}
