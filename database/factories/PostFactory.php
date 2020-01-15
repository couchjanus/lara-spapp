<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'category' => $faker->word(),
        'content' => $faker->paragraph(20),
        'imgname' => $faker->numberBetween($min = 1, $max = 3),
        'created_at' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now')->format('Y-m-d H:i:s')
    ];
});
