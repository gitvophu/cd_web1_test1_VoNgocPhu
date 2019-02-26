<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_booking', function (Blueprint $table) {
            $table->increments('id');/*
 － From: Danh sách các thành phố đi.
－ To: Danh sách các thành phố đến.
－ Departure: Ngày đi.
－ Kiểu đi (one way: Một chiều, Return: Khứ hồi)
－ Return: ngày về (Yêu cầu chọn khi đi khứ hồi)
－ Total Person: Số người đi
－ Flight class: Hạng vé (Economy Flex, Economy Standard, Business)*/
            $table->unsignedInteger('from');
            $table->unsignedInteger('to');
            $table->timestamp('departure');
            $table->integer('way_type');
            $table->timestamp('return');
            $table->integer('total_person');
            $table->integer('flight_class');
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
        Schema::dropIfExists('flight_booking');
    }
}
