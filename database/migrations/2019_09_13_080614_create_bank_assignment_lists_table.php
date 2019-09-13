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
            $table->integer('fuser_id'); //foreign key from users
            $table->integer('fbank_id'); //foreign key from banks
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
        Schema::dropIfExists('bank_assignment_lists');
    }
}
