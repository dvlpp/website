<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Techno::class, function (Faker\Generator $faker) {
    return [
        'nom' => $faker->word,
    ];
});

$factory->define(App\Projet::class, function (Faker\Generator $faker) {
    return [
        'titre' => $faker->word,
        'soustitre' => $faker->sentence,
        'texte' => $faker->paragraphs(3, true),
        'slug' => $faker->slug,
        'url' => $faker->url,
        'etat' => 3,
        'ordre' => $faker->numberBetween(1, 10)
    ];
});