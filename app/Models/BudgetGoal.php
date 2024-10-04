<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Eelarve eesmärgi mudel
class BudgetGoal extends Model
{
    use HasFactory;

    // maarab millised andmed saavad sisestatud olla
    protected $fillable = [
        'description', // Eesmärgi kirjeldus
        'goal_amount', // Eesmärgi summa
        'current_amount', // Praegune summa, mis on säästud
    ];
}
