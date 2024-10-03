<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetGoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'goal_amount',
        'current_amount',
    ];
}
