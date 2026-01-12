<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
        protected $fillable = [
        'title',
        'label',
        'url',
        'type',
        'main_menu_id',  
    ];

        public function subMenus()
    {
        return $this->hasMany(Header::class, 'main_menu_id');
    }

    public function parentMenu()
    {
        return $this->belongsTo(Header::class, 'main_menu_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'main_menu_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'main_menu_id')
                    ->where('type', 'sub-menu');
    }

}
