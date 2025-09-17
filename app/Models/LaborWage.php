<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaborWage extends Model
{
    use HasFactory;

    protected $fillable = [
        'laborer_id',
        'task_id',
        'hours_worked',
        'wage_amount',
        'date',
    ];

    protected function casts(): array
    {
        return [
            'hours_worked' => 'decimal:2',
            'wage_amount' => 'decimal:2',
            'date' => 'date',
        ];
    }

    /**
     * Get the laborer that owns the wage record.
     */
    public function laborer()
    {
        return $this->belongsTo(Laborer::class);
    }

    /**
     * Get the task that the wage is for.
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}