<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_id')->unsigned();
            $table->integer('approved_by')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->string('reference');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('ic_no');
            $table->string('address');
            $table->string('image_url');
            //$table->foreign('status_id')->references('status_id')->on('statuses');
            //$table->foreign('approved_by')->references('user_type')->on('user');
            $table->timestamp('status_change_datetime');
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
        Schema::dropIfExists('card_applications');
    }
}
