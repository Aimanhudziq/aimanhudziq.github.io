<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_no')->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('ic_no');
            $table->string('address');
            $table->string('image_url');
            $table->integer('fstatus_code')->unsigned()->index();
            $table->integer('fbank_code')->unsigned()->index();
            $table->timestamps();

            $table->foreign('fstatus_code')->references('status_code')->on('statuses')->onDelete('cascade');
            $table->foreign('fbank_code')->references('bank_code')->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_details');
    }
}
