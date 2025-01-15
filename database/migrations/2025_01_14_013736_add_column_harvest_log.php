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
            $table->double('duration')->nullable();
            $table->string('picture')->nullable();
            $table->string('picture_path')->nullable();
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
            $table->dropColumn('duration');
            $table->dropColumn('picture');
            $table->dropColumn('picture_path');
        });
    }
};
