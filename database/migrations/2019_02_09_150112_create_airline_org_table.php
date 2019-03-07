<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirlineOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_org', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('code',50);
            $table->unsignedInteger('nation_id');
            $table->foreign('nation_id')->references('id')->on('nation');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airline_org');
    }
}
