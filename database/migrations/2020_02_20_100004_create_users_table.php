<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('dni')->unique();
            $table->string('name_user')->unique();
            $table->boolean('estado');
            $table->string('password');
            $table->string('imgURL')->nullable();
            $table->rememberToken();
            $table->timestamps();

            //FK
           $table->unsignedBigInteger('profile_id');
           $table->foreign('profile_id')->references('id')->on('profiles')->onDelte("cascade");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
