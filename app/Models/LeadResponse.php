<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadResponse extends Model
{
    protected $table = 'car_responses';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'car_options',
    ];

    protected $casts = [
        'car_options' => 'array',
    ];
}
