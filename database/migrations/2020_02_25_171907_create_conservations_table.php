<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->string('row');
            $table->string('column');
            $table->string('description');
            $table->string('numeration');
            $table->string('range');
            $table->string('folios');
            $table->string('observation');

            //FK
           $table->unsignedBigInteger('typeCon_id');
           $table->foreign('typeCon_id')->references('id')->on('conservation_types')->onDelte("cascade");
            //FK
            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id')->references('id')->on('years')->onDelte("cascade");
             //FK
           $table->unsignedBigInteger('shelf_id');
           $table->foreign('shelf_id')->references('id')->on('shelves')->onDelte("cascade");
            //FK
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelte("cascade");
             //FK
           $table->unsignedBigInteger('subSection_id');
           $table->foreign('subSection_id')->references('id')->on('sub_sections')->onDelte("cascade");
            $table->timestamps();

          //  typeCon
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conservations');
    }
}
