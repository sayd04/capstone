<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laborer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'hourly_rate',
    ];

    protected function casts(): array
    {
        return [
            'hourly_rate' => 'decimal:2',
        ];
    }

    /**
     * Get the tasks assigned to the laborer.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }

    /**
     * Get the labor wages for the laborer.
     */
    public function laborWages()
    {
        return $this->hasMany(LaborWage::class);
    }
}