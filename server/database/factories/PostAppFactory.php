<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PostApp;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(PostApp::class, function (Faker $faker) {
    return [
        'image_file_name' => $faker->text(50),
        'title' => $faker->text(255),
        'language' => $faker->text(255),
        'description' => $faker->text(500),
        'user_id' => function () {
            return factory(User::class);
        }
    ];
});
