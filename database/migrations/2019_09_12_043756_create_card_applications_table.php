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
            $table->string('checked_by');
            $table->integer('fstatus_code')->unsigned()->index();
            $table->string('fuser_staff_id')->index();
            $table->integer('fbank_code')->unsigned()->index();
            $table->string('comment')->null();
            $table->string('violated_policy')->null();
            $table->timestamp('status_change_datetime');
            $table->timestamps();

            $table->foreign('fstatus_code')->references('status_code')->on('statuses')->onDelete('cascade');
            $table->foreign('fuser_staff_id')->references('user_staff_id')->on('users')->onDelete('cascade');

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
