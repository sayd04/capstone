<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planting extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id',
        'rice_variety_id',
        'planting_method',
        'land_preparation_date',
        'seeding_date',
        'transplanting_date',
        'planting_date',
        'expected_harvest_date',
        'seed_rate_kg_per_hectare',
        'season',
        'plant_spacing_cm',
        'fertilizer_plan',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'land_preparation_date' => 'date',
            'seeding_date' => 'date',
            'transplanting_date' => 'date',
            'planting_date' => 'date',
            'expected_harvest_date' => 'date',
            'seed_rate_kg_per_hectare' => 'decimal:2',
        ];
    }

    /**
     * Get the field that owns the planting.
     */
    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    /**
     * Get the rice variety for this planting.
     */
    public function riceVariety()
    {
        return $this->belongsTo(RiceVariety::class);
    }

    /**
     * Get the farming stages for this planting.
     */
    public function farmingStages()
    {
        return $this->hasMany(RiceFarmingStage::class);
    }

    /**
     * Get the harvests for the planting.
     */
    public function harvests()
    {
        return $this->hasMany(Harvest::class);
    }

    /**
     * Get the tasks for the planting.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get the expenses for the planting.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}