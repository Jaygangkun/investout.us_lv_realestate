<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('image')->nullable()->default('default.png');
            $table->string('location');
            $table->string('zipCode');
            $table->string('city');
            $table->string('state');
            $table->string('phone');
            $table->string('company');
            $table->text('aboutme')->nullable()->default('');
            $table->text('experience')->nullable()->default('');
            $table->string('socialmedia')->nullable()->default('');
            $table->string('inputvideo')->nullable()->default('');
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
        Schema::dropIfExists('profiles');
    }
}
