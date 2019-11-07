<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jeux;
use Faker\Generator as Faker;

$factory->define(Jeux::class, function (Faker $faker) {
    return [
        'nom' => $faker->text(10),
        'editeur_id' => $faker->numberBetween(1,3),
        'genre_id' => $faker->numberBetween(1,5),
        'annee' => $faker->numberBetween(2000,2020),
        'nbre_joueur_min' =>$faker->numberBetween(2,8),
        'duree_min' => $faker->numberBetween(5,25),
        'duree_max' => $faker->numberBetween(30,80),
        'nbre_joueur_max' => $faker->numberBetween(1,8),
        'age' => $faker->numberBetween(7,16),
        'date_maj' => now(),
        'created_at' => now(),
        'descriptif' => $faker->text(150),
    ];
});
