<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function prodect()
    {
    	return $this->belongsTo('App\Model\Prodect');
    }}
