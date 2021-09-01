<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('admins')->onDelete('cascade');
            $table->bigInteger('date_id')->unsigned()->nullable();
            $table->foreign('date_id')->references('id')->on('doctor_dates')->onDelete('cascade');
            $table->bigInteger('hour_id')->unsigned()->nullable();
            $table->foreign('hour_id')->references('id')->on('doctor_hours')->onDelete('cascade');
            $table->bigInteger('disease_id')->unsigned()->nullable();
            $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',['new','accepted','refused'])->default('new')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
