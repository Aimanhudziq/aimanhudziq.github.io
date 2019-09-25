<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotAllowedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('not_alloweds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fpolicy_no')->unsigned()->index();
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
        Schema::dropIfExists('not_alloweds');
    }
}
