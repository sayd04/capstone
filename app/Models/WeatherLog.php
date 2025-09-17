<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id',
        'temperature',
        'humidity',
        'wind_speed',
        'conditions',
        'recorded_at',
    ];

    protected function casts(): array
    {
        return [
            'temperature' => 'decimal:2',
            'humidity' => 'decimal:2',
            'wind_speed' => 'decimal:2',
            'recorded_at' => 'datetime',
        ];
    }

    /**
     * Get the field that the weather log belongs to.
     */
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}