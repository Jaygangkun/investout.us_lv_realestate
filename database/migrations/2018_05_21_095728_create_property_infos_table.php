<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('easement_claim')->nullable()->default('');
            $table->string('occupy_last')->nullable()->default('');
            $table->string('leased')->nullable()->default('');
            $table->string('occupy_current')->nullable()->default('');
            $table->string('landfill')->nullable()->default('');
            $table->string('flood_plain')->nullable()->default('');
            $table->string('danger_zone')->nullable()->default('');
            $table->string('earthquake_zone')->nullable()->default('');
            $table->string('earth_movement_zone')->nullable()->default('');
            $table->string('unrecorded_easements')->nullable()->default('');
            $table->string('old')->nullable()->default('');
            $table->string('problem')->nullable()->default('');
            $table->string('pest_damage')->nullable()->default('');
            $table->string('pest_license')->nullable()->default('');
            $table->string('structure_problem')->nullable()->default('');
            $table->string('repair')->nullable()->default('');
            $table->string('water_leakage')->nullable()->default('');
            $table->string('structure_changes')->nullable()->default('');
            $table->string('zone_regulataion')->nullable()->default('');
            $table->string('water_source')->nullable()->default('');
            $table->string('sewer_system')->nullable()->default('');
            $table->string('water_sewer_leaks')->nullable()->default('');
            $table->string('plumbing')->nullable()->default('');
            $table->string('toxic_substance')->nullable()->default('');
            $table->string('radon_tested')->nullable()->default('');
            $table->string('fuel_storage')->nullable()->default('');
            $table->string('restrictions')->nullable()->default('');
            $table->string('association_fee_condition')->nullable()->default('');
            $table->string('association_fee_unit')->nullable()->default('');
            $table->string('association_fee')->nullable()->default('');
            $table->string('initiation_fee')->nullable()->default('');
            $table->string('assessments_approved')->nullable()->default('');
            $table->string('litigation')->nullable()->default('');
            $table->string('laws_violation')->nullable()->default('');
            $table->string('equipment_repair')->nullable()->default('');
            $table->string('asbestos')->nullable()->default('');

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
        Schema::dropIfExists('property_questions');
    }
}
