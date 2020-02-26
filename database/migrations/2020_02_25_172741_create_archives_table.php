<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fileDocument');
            $table->string('folio');
            $table->string('recurrent');
            $table->string('affair');
            $table->string('receptive');
            $table->string('observation');


            //FK
            $table->unsignedBigInteger('conservation_id');
            $table->foreign('conservation_id')->references('id')->on('conservations')->onDelte("cascade");
            //FK
            $table->unsignedBigInteger('serie_id');
            $table->foreign('serie_id')->references('id')->on('series')->onDelte("cascade");
            //FK
            $table->unsignedBigInteger('subSerie_id');
            $table->foreign('subSerie_id')->references('id')->on('sub_series')->onDelte("cascade");
            //FK
            $table->unsignedBigInteger('accessibilitie_id');
            $table->foreign('accessibilitie_id')->references('id')->on('accessibilities')->onDelte("cascade");
            //FK
            $table->unsignedBigInteger('kind_of_procedure_id');
            $table->foreign('kind_of_procedure_id')->references('id')->on('kind_of_procedures')->onDelte("cascade");
            //FK
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelte("cascade");
            //FK
            $table->unsignedBigInteger('document_value_id');
            $table->foreign('document_value_id')->references('id')->on('document_values')->onDelte("cascade");
            
            
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
        Schema::dropIfExists('archives');
    }
}
