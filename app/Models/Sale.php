<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'harvest_id',
        'buyer_id',
        'quantity',
        'total_amount',
        'sale_date',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'decimal:2',
            'total_amount' => 'decimal:2',
            'sale_date' => 'date',
        ];
    }

    /**
     * Get the harvest that was sold.
     */
    public function harvest()
    {
        return $this->belongsTo(Harvest::class);
    }

    /**
     * Get the buyer that purchased the harvest.
     */
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}