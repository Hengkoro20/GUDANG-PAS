<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'item_name',
        'stock',
        'category_name'
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_name', 'name');
    }
}
