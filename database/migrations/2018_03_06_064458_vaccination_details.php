<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VaccinationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vaccination_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('birthcase_id');
            $table->integer('vaccine_id');
            $table->enum('round',['#1','#2','#3','#4','#5']);
            $table->integer('months');
            $table->date('due_date');
            $table->enum('status',['pending','completed']);
            $table->timestamps();

            $table->foreign('birthcase_id')->references('id')->on('birthcases');
            $table->foreign('vaccine_id')->references('id')->on('vaccines');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('vaccination_details');
    }
}
