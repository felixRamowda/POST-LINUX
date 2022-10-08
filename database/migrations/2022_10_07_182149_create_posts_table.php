<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();  //user_id que va hacer referencia al id del usuario

            $table->string('title');//
            $table->string('slug')->unique(); //parametro unico no pueden haber 2 slug iguales

            $table->string('image')->nullable();//puede o no haber imagen
            $table->text('body'); //texto de 800 caracteres que tambien definimos en factory y que usamos en seed para crear los 24 post
            $table->text('iframe')->nullable();//puede haber video o no

            /**
             * user_id que hace referencia al id que esta en la tabla: users
             */
            $table->foreign("user_id")->references("id")->on("users");

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
