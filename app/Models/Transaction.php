<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'item_name',
        'amount',
        'transaction_date',
        'transaction_type',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_name', 'item_name');
    }
}