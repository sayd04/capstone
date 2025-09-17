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
        Schema::create('harvests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('planting_id')->constrained()->onDelete('cascade');
            $table->decimal('yield', 10, 2); // kg or tons
            $table->date('harvest_date');
            $table->enum('quality', ['excellent', 'good', 'fair', 'poor'])->default('good');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvests');
    }
};