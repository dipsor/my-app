<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(App\Users\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Users\Team::class, function (Faker $faker) {

    return [
        'owner_id' => '1',
        'name' => 'Devs',
    ];
});

$factory->define(\Spatie\Permission\Models\Permission::class, function (Faker $faker) {

    return [
        'name' => 'users.all',
        'guard_name' => 'web'
    ];
});

$factory->define(\Spatie\Permission\Models\Role::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
    ];
});



