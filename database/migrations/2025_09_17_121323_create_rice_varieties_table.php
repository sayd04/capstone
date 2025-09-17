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
        Schema::create('rice_varieties', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., IR64, Basmati, Jasmine
            $table->string('type'); // e.g., Long grain, Medium grain, Short grain
            $table->text('description')->nullable();
            $table->integer('growth_duration_days'); // Days from planting to harvest
            $table->decimal('expected_yield_per_hectare', 8, 2); // Tons per hectare
            $table->enum('season', ['wet', 'dry', 'both'])->default('both');
            $table->json('characteristics')->nullable(); // JSON for additional characteristics
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rice_varieties');
    }
};