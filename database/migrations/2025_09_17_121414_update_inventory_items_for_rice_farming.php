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
        Schema::table('inventory_items', function (Blueprint $table) {
            // Add rice-specific fields
            $table->enum('category', [
                'rice_seeds',
                'fertilizers', 
                'pesticides',
                'herbicides',
                'farm_tools',
                'rice_products',
                'milled_rice',
                'brown_rice',
                'organic_rice'
            ])->change();
            
            $table->foreignId('rice_variety_id')->nullable()->after('category')->constrained('rice_varieties')->onDelete('set null');
            $table->enum('quality_grade', ['premium', 'grade_a', 'grade_b', 'grade_c'])->nullable()->after('rice_variety_id');
            $table->text('product_description')->nullable()->after('quality_grade');
            $table->boolean('is_organic')->default(false)->after('product_description');
            $table->date('harvest_date')->nullable()->after('is_organic'); // For rice products
            $table->date('expiry_date')->nullable()->after('harvest_date');
            $table->decimal('moisture_content', 5, 2)->nullable()->after('expiry_date'); // For rice products
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_items', function (Blueprint $table) {
            $table->dropForeign(['rice_variety_id']);
            $table->dropColumn([
                'rice_variety_id',
                'quality_grade',
                'product_description',
                'is_organic',
                'harvest_date',
                'expiry_date',
                'moisture_content'
            ]);
            
            $table->string('category')->change();
        });
    }
};