<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKinInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kin_infos', function (Blueprint $table) {
            $table->id()->nullable();
            $table->integer('user_id');
            $table->string('k_first_name')->nullable();
            $table->string('k_last_name')->nullable();
            $table->string('relation')->nullable();
            $table->string('occupation')->nullable();
            $table->text('k_address')->nullable();
            $table->string('k_mobile')->nullable();
            $table->string('k_email')->nullable();
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
        Schema::dropIfExists('kin_infos')->nullable();
    }
}
