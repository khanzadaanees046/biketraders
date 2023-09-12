<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'bike_id',
        'name',
        'father_name',
        'cnic',
        'address',
        'payment_method',
    ];

    public function bike()
    {
        return $this->belongsTo(Bike::class, 'bike_id', 'id');
    }
}
