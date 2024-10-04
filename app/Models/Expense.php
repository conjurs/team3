<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Kulutuse mudel
class Expense extends Model
{
    use HasFactory;

    // Määrab, millised andmed saab sisestada
    protected $fillable = [
        'description', // Kulutuse kirjeldus
        'amount', // Kulutuse summa
        'date', // Kulutuse kuupäev
        'category', // Kulutuse kategooria
    ];

    // kuidas andmeid töödeldakse
    protected $casts = [
        'date' => 'date', // Muudab 'date' kuupäeva objektiks
    ];
}
