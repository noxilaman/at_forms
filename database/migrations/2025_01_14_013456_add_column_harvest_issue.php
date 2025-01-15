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
        Schema::table('harvest_issues', function (Blueprint $table) {
            $table->string('picture')->nullable();
            $table->string('picture_path')->nullable();
            $table->double('duration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('harvest_issues', function (Blueprint $table) {
            $table->dropColumn('picture');
            $table->dropColumn('picture_path');
            $table->dropColumn('duration');
        });
    }
};
