<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id',
        'payment_id',
        'installment_count',
        'amount',
        'paid_date',
        'status',
    ];
}
