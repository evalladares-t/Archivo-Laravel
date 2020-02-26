<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('acronym');
            $table->string('name');
            $table->string('state');
            $table->string('observation');

            //FK
           $table->unsignedBigInteger('section_id');
           $table->foreign('section_id')->references('id')->on('sections')->onDelte("cascade");
           //FK
           $table->unsignedBigInteger('subSection_id');
           $table->foreign('subSection_id')->references('id')->on('sub_sections')->onDelte("cascade");
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
        Schema::dropIfExists('series');
    }
}
