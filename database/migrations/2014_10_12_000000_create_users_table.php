<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->integer('province_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('town');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('verifyToken')->nullable();
            $table->boolean('status')->default(0);
            $table->string('phone');
            $table->string('package')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
