<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\News;
use App\User;

$factory->define(News::class, function (Faker $faker) {
        return [
            'title' => $faker->words(5, true),
            'content' => $faker->sentences(10, true),
            'user_id' => User::inRandomOrder()->first()->id
        ];
});
