<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('branch_code')->unsigned()->index();
            $table->string('branch_name')->nullable();
            $table->string('branch_address')->nullable();
            $table->integer('fbank_code')->unsigned()->index();
            $table->string('fstate_code2')->index();
            $table->timestamps();

            $table->foreign('fbank_code')->references('bank_code')->on('banks')->onDelete('cascade');
            $table->foreign('fstate_code2')->references('state_code2')->on('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_branches');
    }
}
