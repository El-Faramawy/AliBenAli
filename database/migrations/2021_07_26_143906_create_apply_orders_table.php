<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_orders', function (Blueprint $table) {
            $table->id();
            $table->string('job_name')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('experience')->nullable();
            $table->string('work_address')->nullable();
            $table->string('message')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('details_id')->unsigned()->nullable();
            $table->foreign('details_id')->references('id')->on('join_us_details')->onDelete('cascade');
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
        Schema::dropIfExists('apply_orders');
    }
}
