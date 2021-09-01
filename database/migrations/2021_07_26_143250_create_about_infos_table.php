<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_infos', function (Blueprint $table) {
            $table->id();
            $table->string('text1_ar')->nullable();
            $table->string('text1_en')->nullable();
            $table->string('text2_ar')->nullable();
            $table->string('text2_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('content_ar')->nullable();
            $table->string('content_en')->nullable();
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
        Schema::dropIfExists('about_infos');
    }
}
