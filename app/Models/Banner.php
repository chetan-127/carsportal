<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title',
        'image',
        'link',
        'alt_text',
        'position',
        'display_order',
        'is_active',
    ];
}
