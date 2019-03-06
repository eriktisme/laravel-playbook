<?php

use Faker\Generator as Faker;
use Scaling\Playbook\Tests\Utils\Models\User;

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
