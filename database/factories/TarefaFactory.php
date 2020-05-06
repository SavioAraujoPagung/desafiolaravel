<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tarefa;
use Faker\Generator as Faker;

$factory->define(Tarefa::class, function (Faker $faker) {
    return [
        'nome'=> $faker->unique()->word,
        'descricao'=> $faker->sentence(),
        'tempoMedio'=> 7.9, 
        'custo'=> 20.5,
    ];
});
