<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prodect extends Model
{
    protected $fillable = [
        'name',
        'details',
        'price',
        'stock',
        'descount'
    ];

    public function reviews()
    {
    	return $this->hasMany('App\Model\Review');
    }
}
