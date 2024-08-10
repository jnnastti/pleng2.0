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
        Schema::create('substep', function (Blueprint $table) {
            $table->id();
            $table->integer('stage');
            $table->string('name');
            $table->timestamps();

            $table->foreign('stage')->references('id')->on('stage')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('substep');
    }
};
