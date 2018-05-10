<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->integer('topic_id');
            $table->enum('type',['references','slideshow','quizzes','video','faq']);
            $table->string('description');
            $table->longText('material');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('topic_id')->references('id')->on('topics');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
