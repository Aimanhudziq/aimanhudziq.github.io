<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFreferenceNoToCardApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('card_applications', function (Blueprint $table) {
            $table->string('freference_no')->index()->after('checked_by');
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
        Schema::table('card_applications', function (Blueprint $table) {
            $table->dropColumn('freference_no');
        });
    }
}
