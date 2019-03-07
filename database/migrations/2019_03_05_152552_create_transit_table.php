<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transit', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transit_city_from_id');
            $table->unsignedInteger('transit_city_to_id');
            $table->timestamp('transit_departure_date')->nullable();
            $table->integer('duration');
            $table->unsignedInteger('transit_fl_id');
            $table->foreign('transit_fl_id')->references('id')->on('flight');
            $table->foreign('transit_city_from_id')->references('id')->on('city');
            $table->foreign('transit_city_to_id')->references('id')->on('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transit');
    }
}
