<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJambInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jamb_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('j_no')->nullable();
            $table->string('j_eng_subject')->nullable();
            $table->string('j_eng_score')->nullable();
            $table->string('j_subject1')->nullable();
            $table->string('j_subject1_score')->nullable();
            $table->string('j_subject2')->nullable();
            $table->string('j_subject2_score')->nullable();
            $table->string('j_subject3')->nullable();
            $table->string('j_subject3_score')->nullable();

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
        Schema::dropIfExists('jamb_infos');
    }
}
