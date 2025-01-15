<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('harvest_logs', function (Blueprint $table) {
            $table->string('land_code')->nullable();
            $table->string('farmer_name')->nullable();
            $table->string('progress_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('harvest_logs', function (Blueprint $table) {
            $table->dropColumn('land_code');
            $table->dropColumn('farmer_name');
            $table->dropColumn('progress_status');
        });
    }
};
