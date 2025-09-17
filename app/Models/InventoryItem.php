<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'rice_variety_id',
        'quality_grade',
        'product_description',
        'is_organic',
        'harvest_date',
        'expiry_date',
        'moisture_content',
        'quantity',
        'price',
        'unit',
        'min_stock',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_organic' => 'boolean',
            'harvest_date' => 'date',
            'expiry_date' => 'date',
            'moisture_content' => 'decimal:2',
        ];
    }

    /**
     * Get the rice variety for this inventory item.
     */
    public function riceVariety()
    {
        return $this->belongsTo(RiceVariety::class);
    }

    /**
     * Get the order items for the inventory item.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Check if the item is low in stock.
     */
    public function isLowStock(): bool
    {
        return $this->quantity <= $this->min_stock;
    }

    /**
     * Scope to get low stock items.
     */
    public function scopeLowStock($query)
    {
        return $query->whereRaw('quantity <= min_stock');
    }
}