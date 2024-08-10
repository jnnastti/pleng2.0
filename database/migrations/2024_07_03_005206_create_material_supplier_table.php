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
        Schema::create('material_supplier', function (Blueprint $table) {
            $table->id();
            $table->integer('supplier');
            $table->integer('material');
            $table->timestamps();

            $table->foreign('supplier')->references('id')->on('supplier')->onDelete('cascade');
            $table->foreign('material')->references('id')->on('material')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_supplier');
    }
};
