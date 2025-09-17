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
        Schema::table('fields', function (Blueprint $table) {
            // Add rice-specific field information
            $table->decimal('water_source_distance', 8, 2)->nullable()->after('size'); // Distance to water source in meters
            $table->enum('irrigation_type', ['rainfed', 'irrigated', 'flood'])->default('rainfed')->after('water_source_distance');
            $table->decimal('elevation', 8, 2)->nullable()->after('irrigation_type'); // Elevation in meters
            $table->enum('field_type', ['lowland', 'upland', 'deepwater'])->default('lowland')->after('elevation');
            $table->text('previous_crops')->nullable()->after('field_type'); // Previous crop history
            $table->decimal('ph_level', 3, 1)->nullable()->after('previous_crops'); // Soil pH level
            $table->text('soil_nutrients')->nullable()->after('ph_level'); // NPK levels, organic matter, etc.
            $table->boolean('is_certified_organic')->default(false)->after('soil_nutrients');
            $table->text('field_notes')->nullable()->after('is_certified_organic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->dropColumn([
                'water_source_distance',
                'irrigation_type',
                'elevation',
                'field_type',
                'previous_crops',
                'ph_level',
                'soil_nutrients',
                'is_certified_organic',
                'field_notes'
            ]);
        });
    }
};