<?php

use Faker\Generator as Faker;

use Modules\Clients\Entities\Client;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
