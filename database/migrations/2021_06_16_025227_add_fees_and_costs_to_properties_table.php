<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeesAndCostsToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_details', function (Blueprint $table) {
            $table->string('holding_cost')->nullable();
            $table->string('resale_fee')->nullable();
            $table->string('loan_cost')->nullable();
            $table->string('gross_profit')->nullable();
            $table->string('wholeseller_profit')->nullable();
            $table->string('investor_asking')->nullable();
            $table->string('investor_projected_profit')->nullable();
            $table->string('investor_roi')->nullable();
            $table->string('rule_percentage')->nullable();

            //'gross_profit'
            //                    ,'wholeseller_profit','investor_asking','investor_projected_profit','investor_roi'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_details', function (Blueprint $table) {
            $table->dropColumn(['holding_cost']);
            $table->dropColumn(['resale_fee']);
            $table->dropColumn(['loan_cost']);
            $table->dropColumn(['gross_profit']);
            $table->dropColumn(['wholeseller_profit']);
            $table->dropColumn(['investor_asking']);
            $table->dropColumn(['investor_projected_profit']);
            $table->dropColumn(['investor_roi']);
        });
    }
}
