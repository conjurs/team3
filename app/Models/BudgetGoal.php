<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Define the BudgetGoal model
class BudgetGoal extends Model
{
    use HasFactory; // Use the HasFactory trait for factory support

    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'description', // Description of the budget goal
        'goal_amount', // Target amount for the budget goal
        'current_amount', // Current amount saved towards the budget goal
    ];
}