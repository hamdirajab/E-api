<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Prodect::class, function (Faker $faker) {
    return [
        
        'name' => $faker->word,
        'details' => $faker->paragraph,
        'price' => $faker->numberBetween(100,1000),
        'stock' => $faker->randomDigit,
        'descount' => $faker->numberBetween(2,30)

    ];
});
