<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('freference_no')->unique(); //freference_no refer to the table card (reference)
            $table->integer('ori_status_code')->unsigned()->index();
            $table->integer('new_status_code')->unsigned()->index();
            $table->string('violated_policy')->null();
            $table->timestamps();

            $table->foreign('ori_status_code')->references('status_code')->on('statuses')->onDelete('cascade');
            $table->foreign('new_status_code')->references('status_code')->on('statuses')->onDelete('cascade');
            $table->foreign('freference_no')->references('reference_no')->on('client_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_records');
    }
}
