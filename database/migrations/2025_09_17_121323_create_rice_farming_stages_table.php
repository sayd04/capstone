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
        Schema::create('rice_farming_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('planting_id')->constrained()->onDelete('cascade');
            $table->enum('stage', [
                'land_preparation',
                'seeding',
                'transplanting', 
                'early_vegetative',
                'late_vegetative',
                'reproductive',
                'grain_filling',
                'maturity',
                'harvest'
            ]);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('activities')->nullable(); // Activities performed in this stage
            $table->text('observations')->nullable(); // Farmer observations
            $table->json('weather_conditions')->nullable(); // Weather during this stage
            $table->decimal('water_level_cm', 5, 2)->nullable(); // Water level in field
            $table->text('pest_disease_notes')->nullable();
            $table->text('fertilizer_applied')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rice_farming_stages');
    }
};