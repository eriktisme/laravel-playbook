<?php

use Faker\Generator as Faker;
use Scaling\Playbook\Tests\Utils\Models\Book;
use Scaling\Playbook\Tests\Utils\Models\User;

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->monthName,
        'author_id' => function () {
            return factory(User::class)->create()->getKey();
        },
    ];
});
