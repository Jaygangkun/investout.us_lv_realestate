<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_m_s_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page');
            $table->string('topheading');
            $table->text('topimage');
            $table->text('textbelow');
            $table->string('headingcontent');
            $table->text('content');
            $table->text('contentimage');
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
        Schema::dropIfExists('c_m_s_s');
    }
}
