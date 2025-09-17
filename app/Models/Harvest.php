<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    use HasFactory;

    protected $fillable = [
        'planting_id',
        'yield',
        'harvest_date',
        'quality',
    ];

    protected function casts(): array
    {
        return [
            'yield' => 'decimal:2',
            'harvest_date' => 'date',
        ];
    }

    /**
     * Get the planting that owns the harvest.
     */
    public function planting()
    {
        return $this->belongsTo(Planting::class);
    }

    /**
     * Get the sales for the harvest.
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}