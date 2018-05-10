<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBirthCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('infant_details');
            $table->enum('gender',['male','female']);
            $table->date('date_of_birth');
            $table->string('parents_info');
            $table->string('parents_address');
            $table->string('phone');
            $table->timestamps();
            
            $table->foreign('client_id')->references('id')->on('clients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('birth_cases');
    }
}
