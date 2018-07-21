<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prodect extends Model
{
    public function reviews()
    {
    	return $this->hasMany('App\Model\Review');
    }
}
