<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            /* Definimos que este campo sea *unsigned*
                esto quiere decir que no va a tener signo,
                por ende va a ser un campo positivo y, a su vez, acepte un tipo de dato entero*/
            $table->unsignedBigInteger('user_id');

            /* Creamos un nuevo campo con el metodo
                encargado de la relacion *foreign* */
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('title');
            // Definimos que este campo sea unico con unique().
            $table->string('slug')->unique();
            $table->text('body');

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
};
