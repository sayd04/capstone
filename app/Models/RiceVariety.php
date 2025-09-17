<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiceVariety extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'growth_duration_days',
        'expected_yield_per_hectare',
        'season',
        'characteristics',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'expected_yield_per_hectare' => 'decimal:2',
            'characteristics' => 'array',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the plantings for this rice variety.
     */
    public function plantings()
    {
        return $this->hasMany(Planting::class);
    }

    /**
     * Get the inventory items for this rice variety.
     */
    public function inventoryItems()
    {
        return $this->hasMany(InventoryItem::class);
    }

    /**
     * Scope to get active varieties only.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get varieties by season.
     */
    public function scopeBySeason($query, $season)
    {
        return $query->where('season', $season)->orWhere('season', 'both');
    }
}