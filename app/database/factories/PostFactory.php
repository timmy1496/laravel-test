<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author_id' => rand(1, 100),
        'image_id' => rand(1, 101),
        'content' => $faker->text(rand(50, 100)),
    ];
});
