<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kiv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kiv', function (Blueprint $table) {
            $table->increments('kiv_id');
            $table->integer('status_id')->unsigned();
            $table->integer('approved_by')->unsigned();
            $table->foreign('status_id')->references('status_id')->on('status');
            $table->foreign('approved_by')->references('user_id')->on('user');
            $table->date('status_change_date');
            $table->time('status_change_time');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kiv');
    }
}
