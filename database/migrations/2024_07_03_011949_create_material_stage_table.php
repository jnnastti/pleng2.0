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
        Schema::create('material_stage', function (Blueprint $table) {
            $table->id();
            $table->integer('material');
            $table->integer('stage');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('material')->references('id')->on('material')->onDelete('cascade');
            $table->foreign('stage')->references('id')->on('stage')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_stage');
    }
};
