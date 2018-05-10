<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasefilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casefiles', function (Blueprint $table) {
            // Basic Configuration Information
            $table->increments('id');
            $table->integer('client_id');
            // $table->integer('user_id');
            $table->string('casefile_id')->unique();
            //casefile information
            $table->date('registration_date');
            //Patient Information
            $table->string('patient_name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('contact');
            $table->string('date_of_birth');
            $table->enum('sex',['male','female']);
            $table->enum('marital_status',['single','married','divorced','widowed']);
            $table->string('bloodgroup')->nullable();
            $table->string('genotype')->nullable();
            $table->string('employer')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('employer_contact')->nullable();
            // important
            $table->string('emergency_contact');
            $table->string('emergency_phone');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casefiles');
    }
}
