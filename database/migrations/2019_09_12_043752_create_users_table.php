<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_staff_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_type');
            $table->integer('frole_code')->unsigned()->index();
            //$table->integer('fbank_code')->unsigned()->index();
            $table->timestamps();

            $table->foreign('frole_code')->references('role_code')->on('roles')->onDelete('cascade');
            //$table->foreign('fbank_code')->references('bank_code')->on('banks')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('users', function (Blueprint $table) {
            //
        });
    }
}
