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
        Schema::create('harvest_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('harvester_id');
            $table->integer('crop_id');
            $table->integer('farmer_id');
            $table->date('harvest_date');
            $table->string('area');
            $table->integer('driver_id');
            $table->double('area_size');
            $table->datetime('start_time')->nullable();
            $table->datetime('end_time')->nullable();
            $table->double('yield')->nullable();
            $table->double('fuel_litres')->nullable();
            $table->string('weather')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['active', 'inactive']);
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
        Schema::dropIfExists('harvest_logs');
    }
};
