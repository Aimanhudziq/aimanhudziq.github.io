<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKivsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kivs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status_id');
            $table->string('approved_by');
            $table->timestamp('status_change_datetime');
            $table->string('fuser_id',10);
            //$table->foerign('fuser_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->timestamp('deleted_at');
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
        Schema::dropIfExists('kivs');
    }
}
