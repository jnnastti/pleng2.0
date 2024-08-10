<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('initial_survey', function (Blueprint $table) {
            $table->id();
            $table->integer('stage');
            $table->integer('project');
            $table->string('description')->nullable();
            $table->double('current_size', 9, 2)->nullable();
            $table->double('total_size', 9, 2);
            $table->enum('state', ['not started', 'in progress', 'canceled', 'concluded', 'paused'])->default('not started');
            $table->date('initial_date');
            $table->date('final_date')->nullable();
            $table->timestamps();

            $table->foreign('stage')->references('id')->on('stage')->onDelete('cascade');
            $table->foreign('project')->references('id')->on('project')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('initial_survey');
    }
};
