<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planting extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id',
        'crop_type',
        'planting_date',
        'expected_harvest_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'planting_date' => 'date',
            'expected_harvest_date' => 'date',
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