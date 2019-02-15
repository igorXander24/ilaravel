<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    #<- UP, la clase Schema y su método create, crea la tabla
    #<- Se ejecutan con el comando php artisan migrate [TODOS LOS UP]
    #<- Esta migración viene por defecto en laravel
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken(); #<-
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    #<- Se ejecutan con el comando php artisan migrate:rollback [TODOS LOS DOWN]
    public function down()
    {
        Schema::dropIfExists('users');
    }

    #<- Las migraciones tambien se pueden nombar WAOOOO
    #<- para crear una migracion en especifico usar el siguiente comando
    #<- php artisan make:migration create_message_table --create=messages
}
