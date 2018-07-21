<?php

use Faker\Generator as Faker;
use App\Model\Prodect;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        
    	'prodect_id' => function (){
    		
    		return Prodect::all()->random();
        },
        'customer' => $faker->name,
        'review' => $faker->paragraph,
        'star' => $faker->numberBetween(0,5),

    ];
});
