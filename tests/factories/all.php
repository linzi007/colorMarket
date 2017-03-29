<?php

$factory('App\User', [
    'name' => $faker->userName,
    'email' => $faker->email,
    'password' => $faker->password
]);

$factory('App\Post', [
    'user_id' => 'factory:App\User',
    'title' => $faker->sentence,
    'body' => $faker->paragraph
]);