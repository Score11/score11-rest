<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use App\Movie;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Movie::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->numberBetween(1, 99999),
        'imdbID' => $faker->numberBetween(1, 9999999),
        'regUID' => 1,
        'regDate' => '2014-11-10 21:21:48',
        'lastrated' => '2014-11-10 21:21:48',
        'genre1' => 7,
        'genre2' => 4,
        'genre3' => 5,
        'genre4' => 8,
        'ratings' => 40,
        'ratingsavg' => 6.92,
        'comments' => 2,
        's0' => 0,
        's1' => 1,
        's2' => 0,
        's3' => 1,
        's4' => 1,
        's5' => 1,
        's6' => 9,
        's7' => 16,
        's8' => 5,
        's9' => 6,
        's10' => 2,
        's11' => 0,
        'ori' => 1,
        'de' => 2,
        'us' => 1,
        'regie' => $faker->name,
        'actor' => $faker->name,
        'image' => 'y'
    ];
});

$factory->define(\App\MovieStart::class, function (Faker\Generator $faker) {
    return [
        'movieID' => factory(Movie::class)->make()->id,
        'date' => $faker->dateTimeBetween('+0 days', '+2 years'),
        'agentID' => 7
    ];
});
$factory->define(\App\Title::class, function (Faker\Generator $faker) {
    return [
        'movieID' => factory(Movie::class)->make()->id,
        'agentID' => 1,
        'version' => 'de',
        'title' => $faker->sentence(3),
        'year' => $faker->year,
        'timestamp' => ''
    ];
});