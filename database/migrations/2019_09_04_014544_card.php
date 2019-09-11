<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Card extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card', function (Blueprint $table) {
            $table->increments('card_id');
            $table->integer('status_id')->unsigned();
            $table->integer('approved_by')->unsigned();
            $table->string('reference');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('ic');
            $table->string('address');
            $table->string('image');
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
        Schema::dropIfExists('card');
    }
}
