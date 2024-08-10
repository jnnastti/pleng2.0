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
        Schema::create('diary_substep', function (Blueprint $table) {
            $table->id();
            $table->integer('substep');
            $table->integer('diary');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('substep')->references('id')->on('substep')->onDelete('cascade');
            $table->foreign('diary')->references('id')->on('work_diary')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diary_substep');
    }
};
