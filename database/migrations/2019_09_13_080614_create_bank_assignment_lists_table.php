<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAssignmentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_assignment_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fuser_staff_id')->unique(); //foreign key from users
            $table->integer('fbank_code')->unsigned()->index(); //foreign key from banks
            $table->timestamps();

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
        Schema::dropIfExists('bank_assignment_lists');
    }
}
