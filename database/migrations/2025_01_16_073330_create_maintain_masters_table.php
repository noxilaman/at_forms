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
        Schema::create('maintain_masters', function (Blueprint $table) {
            $table->id();
            $table->date('maintain_date');
            $table->integer('harvester_id');
            $table->integer('mechanic_id')->nullable();
            $table->integer('driver_id');
            $table->integer('question_set_id');
            $table->text('note')->nullable();
            $table->string('process_status')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('maintain_masters');
    }
};
