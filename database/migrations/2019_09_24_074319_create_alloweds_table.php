<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllowedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alloweds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fpolicy_no')->index();
            $table->string('desc');
            $table->timestamps();

            $table->foreign('fpolicy_no')->references('policy_no')->on('policies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alloweds');
    }
}
