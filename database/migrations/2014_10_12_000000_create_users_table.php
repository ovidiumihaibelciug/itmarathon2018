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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('first_name')->default('a');;
            $table->string('last_name')->default('b');;
            $table->string('description')->nullable();
            $table->integer('cabinet_id')->default(0);
            $table->string('username')->unique();
            $table->string('image_id')->default(0);
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role')->comment('1 - Administrator, 2 - Client')->default(1);
            $table->string('program')->default(0);
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
        Schema::dropIfExists('users');
    }
}
