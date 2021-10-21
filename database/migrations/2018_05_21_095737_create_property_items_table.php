<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->boolean('burglar_alarm')->nullable()->default(0);
            $table->boolean('smoke_detector')->nullable()->default(0);
            $table->boolean('fire_alarm')->nullable()->default(0);
            $table->boolean('central_air')->nullable()->default(0);
            $table->boolean('central_heating')->nullable()->default(0);
            $table->boolean('window_ac')->nullable()->default(0);
            $table->boolean('dishwasher')->nullable()->default(0);
            $table->boolean('trash_compactor')->nullable()->default(0);
            $table->boolean('garbage_disposal')->nullable()->default(0);
            $table->boolean('oven')->nullable()->default(0);
            $table->boolean('microwave')->nullable()->default(0);
            $table->boolean('tv_antenna')->nullable()->default(0);
            $table->boolean('satelite_dish')->nullable()->default(0);
            $table->boolean('intercom_system')->nullable()->default(0);
            $table->boolean('pool')->nullable()->default(0);
            $table->boolean('washer_dryer')->nullable()->default(0);
            $table->boolean('hot_tub')->nullable()->default(0);
            $table->boolean('washer')->nullable()->default(0);
            $table->boolean('dryer')->nullable()->default(0);
            $table->boolean('refrigerator')->nullable()->default(0);
            $table->boolean('pool_barrier')->nullable()->default(0);
            $table->boolean('safety_cover_hottub')->nullable()->default(0);
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
        Schema::dropIfExists('property_items');
    }
}
