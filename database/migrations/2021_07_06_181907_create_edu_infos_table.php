<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEduInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('type')->nullable();
            $table->string('f_school')->nullable();
            $table->string('f_year')->nullable();
            $table->string('f_other')->nullable();
            $table->string('t_school')->nullable();
            $table->string('t_study')->nullable();
            $table->string('t_other')->nullable();
            $table->string('t_level')->nullable();
            $table->string('t_year')->nullable();
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
        Schema::dropIfExists('edu_infos');
    }
}
