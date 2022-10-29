<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        /**
         * seeds es donde configuramos nuestros datos de semilla es decir los datos que vamos a crear
         * en las tablas de nuestras bases de datos...
         *
         *
         */



        /*Aqui creamos un usuario manual el cual sera el admin de nuestra app */
        App\User::create([
            'name' => 'felix ramos',
            'email'=> 'felix.ramos@gmail.com',
            'password'=> bcrypt('12356')

        ]);
        //Aqui creamos los 24 post que ya tenemos configurados en los factorys
        factory(App\Post::class,24)->create();


        /**
         * para crear el usuario manual se utiliza create por que si usamos factory
         * el usuario se crearia de forma aleatoria y no se forma manual
         * no sabriamos el usuario ni la contraseña de dicho usuario
         */


         /**
          * Una vez todo configurado las tablas los factory
           * necesitamos refrescar la migracion(recordar tener configurada la conexion de la base de datos
           * en el archivo .env)
           * EJECUTAMOS EL SIGUIENTE COMANDO: "php artisan migrate:refresh --seed"
           * esta ejecucion crea las tablas y manda los datos semilla a las tablas
           * podemos verificar en nuestro Mysql los datos creados
          */
    }
}
