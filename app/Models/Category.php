<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'category_name'
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'category_name', 'category_name');
    }
    
}


