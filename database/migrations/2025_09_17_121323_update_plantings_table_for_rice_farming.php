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
        Schema::table('plantings', function (Blueprint $table) {
            // Remove generic crop_type and add rice-specific fields
            $table->dropColumn('crop_type');
        });
        
        Schema::table('plantings', function (Blueprint $table) {
            $table->foreignId('rice_variety_id')->after('field_id')->constrained('rice_varieties')->onDelete('cascade');
            $table->enum('planting_method', ['direct_seeding', 'transplanting', 'broadcasting'])->default('transplanting')->after('rice_variety_id');
            $table->date('land_preparation_date')->nullable()->after('planting_method');
            $table->date('seeding_date')->nullable()->after('land_preparation_date'); // For nursery
            $table->date('transplanting_date')->nullable()->after('seeding_date');
            $table->decimal('seed_rate_kg_per_hectare', 8, 2)->nullable()->after('transplanting_date');
            $table->enum('season', ['wet', 'dry'])->after('seed_rate_kg_per_hectare');
            $table->integer('plant_spacing_cm')->nullable()->after('season'); // Plant spacing in cm
            $table->text('fertilizer_plan')->nullable()->after('plant_spacing_cm');
            $table->enum('status', ['land_preparation', 'seeding', 'transplanting', 'vegetative', 'reproductive', 'maturity', 'harvested'])->default('land_preparation')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plantings', function (Blueprint $table) {
            $table->dropForeign(['rice_variety_id']);
            $table->dropColumn([
                'rice_variety_id',
                'planting_method',
                'land_preparation_date',
                'seeding_date',
                'transplanting_date',
                'seed_rate_kg_per_hectare',
                'season',
                'plant_spacing_cm',
                'fertilizer_plan'
            ]);
        });
        
        Schema::table('plantings', function (Blueprint $table) {
            $table->string('crop_type')->after('field_id');
            $table->enum('status', ['planted', 'growing', 'ready', 'harvested'])->default('planted')->change();
        });
    }
};