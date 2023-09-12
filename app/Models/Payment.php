<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id',
        'advance_payment',
        'paid_amount',
        'total_price',
        'status',
    ];

    public function sale()
    {
        return $this->belongsTo(BikeSale::class, 'sale_id', 'id');
    }
    // public function bike()
    // {
    //     return $this->belongsTo(BikeSale::class, 'sale_id', 'id');
    // }
}
