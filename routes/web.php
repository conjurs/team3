<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\BudgetGoalController;

// Avaleht, näitab 'welcome' lehte
Route::get('/', function () {
    return view('welcome');
});

// Näitab kõiki kulusid
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');

// Leht uue kulu lisamiseks
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');

// Salvestab uue kulu
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

// Näitab kõiki eelarve eesmärke
Route::get('/budget-goals', [BudgetGoalController::class, 'index'])->name('budget-goals.index');

// Leht uue eelarve eesmärgi lisamiseks
Route::get('/budget-goals/create', [BudgetGoalController::class, 'create'])->name('budget-goals.create');

// Salvestab uue eelarve eesmärgi
Route::post('/budget-goals', [BudgetGoalController::class, 'store'])->name('budget-goals.store');

// Kustutab kulu
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');