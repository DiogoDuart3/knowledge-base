<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\models\Issue;
use Faker\Generator as Faker;

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'subject' => $faker->company(),
        'description' => $faker->realText(100),
        'category_id' => 1,
    ];
});
