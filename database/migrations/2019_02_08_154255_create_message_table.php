<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
#<- Se creo con el siguiente comando
#<- php artisan make:migration create_message_table --create=messages
class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->default('');
            $table->string('email')->default('');
            $table->string('mensaje');
            $table->timestamps();
        });
        #<- Para ejecutar una migración se hace con el seguiente comando
        #<- php artisan migrate
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
