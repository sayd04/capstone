<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'planting_id',
        'task_type',
        'due_date',
        'description',
        'status',
        'assigned_to',
    ];

    protected function casts(): array
    {
        return [
            'due_date' => 'date',
        ];
    }

    /**
     * Get the planting that owns the task.
     */
    public function planting()
    {
        return $this->belongsTo(Planting::class);
    }

    /**
     * Get the laborer assigned to the task.
     */
    public function laborer()
    {
        return $this->belongsTo(Laborer::class, 'assigned_to');
    }

    /**
     * Get the labor wages for the task.
     */
    public function laborWages()
    {
        return $this->hasMany(LaborWage::class);
    }
}