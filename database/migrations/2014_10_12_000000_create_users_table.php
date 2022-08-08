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
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->enum('gender', ['Male', 'Female']);
            $table->integer('age');
            $table->integer('coin');
            $table->string('linkedin_link')->nullable();
            $table->string('phone_num');
            $table->integer('register_price');
            $table->boolean('visibility')->default(true);
            $table->unsignedBigInteger('avatar_id');

            $table->foreign('avatar_id')->references('id')->on('avatars');

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
        Schema::dropIfExists('users');
    }
}
