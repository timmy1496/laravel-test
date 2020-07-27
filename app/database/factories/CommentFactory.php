<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => rand(1, 100),
        'commentator_id' => rand(1, 100),
        'content' => $faker->text(rand(5, 10)),
    ];
});
