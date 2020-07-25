<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ProdutosModel;
use Faker\Generator as Faker;

$factory->define(ProdutosModel::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
