<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('bedroom')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('square_footage')->nullable();
            $table->string('price_per_sqft')->nullable();
            $table->string('lot_size')->nullable();
            $table->string('stories')->nullable();
            $table->string('property_type')->nullable();
            $table->string('built')->nullable();
            $table->string('mls')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('country')->nullable();
            $table->string('mortgage')->nullable();
            $table->string('insurance')->nullable();
            $table->string('tax')->nullable();
            $table->string('about')->nullable();
            $table->string('brv_price')->nullable();
            $table->string('investment_price')->nullable();
            $table->string('arv_price')->nullable();
            $table->string('during_date')->nullable();
            $table->string('building_type')->nullable();
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
        Schema::dropIfExists('property_details');
    }
}
