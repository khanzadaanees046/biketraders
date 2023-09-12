<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;
    protected $fillable = [
        'bike_name',
        'capacity',
        'model',
        'year',
        'colour',
        'engine_no',
        'chassis_no',
        'purchase_price',
        'sale_price',
        'purchase_date',
        'sale_date',
    ];
}
