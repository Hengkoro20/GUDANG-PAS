<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'item_name', 
        'current_stock', 
        'total_in', 
        'total_out', 
        'report_date'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_name', 'item_name');
    }
}
