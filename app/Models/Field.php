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
    ];

    protected function casts(): array
    {
        return [
            'size' => 'decimal:2',
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