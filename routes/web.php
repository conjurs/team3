<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\BudgetGoalController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');


Route::get('/budget-goals', [BudgetGoalController::class, 'index'])->name('budget-goals.index');
Route::get('/budget-goals/create', [BudgetGoalController::class, 'create'])->name('budget-goals.create');
Route::post('/budget-goals', [BudgetGoalController::class, 'store'])->name('budget-goals.store');
