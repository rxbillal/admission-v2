<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaecInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waec_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('w_no')->nullable();
            $table->string('w_eng_subject')->nullable();
            $table->string('w_eng_score')->nullable();
            $table->string('w_subject1')->nullable();
            $table->string('w_subject1_score')->nullable();
            $table->string('w_subject2')->nullable();
            $table->string('w_subject2_score')->nullable();
            $table->string('w_subject3')->nullable();
            $table->string('w_subject3_score')->nullable();
            $table->string('w_subject4')->nullable();
            $table->string('w_subject4_score')->nullable();
            $table->string('w_subject5')->nullable();
            $table->string('w_subject5_score')->nullable();
            $table->string('w_subject6')->nullable();
            $table->string('w_subject6_score')->nullable();
            $table->string('w_subject7')->nullable();
            $table->string('w_subject7_score')->nullable();
            $table->string('w_subject8')->nullable();
            $table->string('w_subject8_score')->nullable();
            $table->string('w_subject9')->nullable();
            $table->string('w_subject9_score')->nullable();
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
        Schema::dropIfExists('waec_infos');
    }
}
