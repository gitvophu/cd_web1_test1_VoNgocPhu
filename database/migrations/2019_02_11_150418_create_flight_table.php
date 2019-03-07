<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('org_id');
            $table->float('unit_cost');
            $table->unsignedInteger('from');
            $table->unsignedInteger('to');
            $table->unsignedInteger('flight_type');
            $table->integer('economy_seat_num');
            $table->integer('economy_premium_seat_num');
            $table->integer('bussiness_seat_num');
            $table->integer('total_seat_booked');
            $table->timestamp('departure');
            $table->timestamp('return')->nullable();
            $table->integer('duration');
            $table->integer('transit');
            
            $table->timestamps();
            $table->foreign('org_id')->references('id')->on('airline_org');
            $table->foreign('from')->references('id')->on('city');
            $table->foreign('to')->references('id')->on('city');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight');
    }
}
