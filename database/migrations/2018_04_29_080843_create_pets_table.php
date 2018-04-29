<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('cabinet_id')->default(0);
            $table->string('name');
            $table->string('sex');
            $table->integer('waist');
            $table->string('birthday')->default(0);
            $table->string('deathday')->default(0);
            $table->string('description');
            $table->string('observations');

            $table->string('type')->comment('Catel/Pisica/Sobolan/Castor');
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
        Schema::dropIfExists('pets');
    }
}
