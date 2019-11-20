<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'description' => $faker->paragraphs(2,true),
        'price' => $faker->numberBetween(99,999)
    ];
});
