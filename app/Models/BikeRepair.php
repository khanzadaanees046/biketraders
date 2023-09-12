<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeRepair extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'customer_name',
        'bike_chase_no',
        'bike_no',
        'receiving_date',
        'delivery_date',
        'status',
        'description',
    ];
}
