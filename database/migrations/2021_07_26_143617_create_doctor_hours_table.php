<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_hours', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('date_id')->unsigned()->nullable();
            $table->foreign('date_id')->references('id')->on('doctor_dates')->onDelete('cascade');
            $table->string('hour')->nullable();
            $table->enum('is_reserved',['yes','no'])->default('no')->nullable();
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
        Schema::dropIfExists('doctor_hours');
    }
}
