<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

//Definimos los datos que se van crear automaticamente  en nuestra tabla post
$factory->define(Post::class, function (Faker $faker) {

    return [
         'user_id' => 1, //Definimos que el user id siempre sera 1 es decir el id que le corresponde al usuario con id 1 que creamos manual

         'title'   => $faker->sentence(), //Creamos un titulo
         'body'    => $faker ->text(800),  //se crea un texto de 800 caracteres
    ];

});
