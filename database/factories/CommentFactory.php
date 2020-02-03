<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        "author_name" => $faker->name,
        "author_email" => $faker->email,
        "content" => $faker->paragraph,
        "post_id" => factory(\App\Post::class)->create()->id
    ];
});
