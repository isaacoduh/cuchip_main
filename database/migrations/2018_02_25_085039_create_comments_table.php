<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            
            $table->increments('id')->unsigned();
            $table->integer('casefile_id');
            $table->integer('user_id');
            $table->longText('comments');
            $table->timestamps();

            $table->foreign('casefile_id')->references('id')->on('casefiles')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

