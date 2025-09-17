<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'location',
        'soil_type',
        'size',
        'water_source_distance',
        'irrigation_type',
        'elevation',
        'field_type',
        'previous_crops',
        'ph_level',
        'soil_nutrients',
        'is_certified_organic',
        'field_notes',
    ];

    protected function casts(): array
    {
        return [
            'size' => 'decimal:2',
            'water_source_distance' => 'decimal:2',
            'elevation' => 'decimal:2',
            'ph_level' => 'decimal:1',
            'is_certified_organic' => 'boolean',
        ];
    }

    /**
     * Get the user that owns the field.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the plantings for the field.
     */
    public function plantings()
    {
        return $this->hasMany(Planting::class);
    }

    /**
     * Get the weather logs for the field.
     */
    public function weatherLogs()
    {
        return $this->hasMany(WeatherLog::class);
    }
}