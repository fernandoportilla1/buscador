<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6),
        'content' => $faker->text($maxNbChars = 100),
        'tags' => join(',', $faker->words(4))
    ];
});
