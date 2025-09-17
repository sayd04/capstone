<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiceFarmingStage extends Model
{
    use HasFactory;

    protected $fillable = [
        'planting_id',
        'stage',
        'start_date',
        'end_date',
        'activities',
        'observations',
        'weather_conditions',
        'water_level_cm',
        'pest_disease_notes',
        'fertilizer_applied',
        'is_completed',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'weather_conditions' => 'array',
            'water_level_cm' => 'decimal:2',
            'is_completed' => 'boolean',
        ];
    }

    /**
     * Get the planting that owns this stage.
     */
    public function planting()
    {
        return $this->belongsTo(Planting::class);
    }

    /**
     * Get the stage duration in days.
     */
    public function getDurationAttribute()
    {
        if (!$this->end_date) {
            return null;
        }
        
        return $this->start_date->diffInDays($this->end_date);
    }

    /**
     * Scope to get completed stages.
     */
    public function scopeCompleted($query)
    {
        return $query->where('is_completed', true);
    }

    /**
     * Scope to get current active stages.
     */
    public function scopeActive($query)
    {
        return $query->where('is_completed', false)->whereNotNull('start_date');
    }
}