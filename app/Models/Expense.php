<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Define the Expense model
class Expense extends Model
{
    use HasFactory; // Use the HasFactory trait for factory support

    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'description', // Description of the expense
        'amount', // Amount of the expense
        'date', // Date of the expense
        'category', // Category of the expense
    ];

    // Specify how attributes should be cast
    protected $casts = [
        'date' => 'date', // Cast the 'date' attribute to a date object
    ];
}