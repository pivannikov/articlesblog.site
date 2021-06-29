<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->word();
    return [
        'user_id' => rand(1, 5),
        'category_id' => rand(1, 5),
        'title' => $title,
        'excerpt' => $faker->realText(rand(250, 300)),
        'body' => $faker->realText(rand(400, 600)),
    ];
});
