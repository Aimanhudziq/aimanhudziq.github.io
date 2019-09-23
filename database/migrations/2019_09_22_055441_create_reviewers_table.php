<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status_code');
            $table->integer('fbank_code')->unsigned()->index();
            $table->string('checked_by');
            $table->string('fuser_staff_id')->unique();
            $table->timestamp('status_change_datetime');
            $table->timestamp('deleted_at');
            $table->timestamps();

            $table->foreign('fuser_staff_id')->references('user_staff_id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('reviewers');
    }
}
