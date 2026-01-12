<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'price',
        'mileage',
        'fuel_type',
        'image',
        'car_type',
    ];
}
