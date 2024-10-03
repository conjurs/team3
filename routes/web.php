<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\BudgetGoalController;

// Route for the home page, returns the 'welcome' view
Route::get('/', function () {
    return view('welcome');
});

// Route to list all expenses, handled by the 'index' method of ExpenseController
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');

// Route to show the form to create a new expense, handled by the 'create' method of ExpenseController
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');

// Route to store a new expense, handled by the 'store' method of ExpenseController
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

// Route to list all budget goals, handled by the 'index' method of BudgetGoalController
Route::get('/budget-goals', [BudgetGoalController::class, 'index'])->name('budget-goals.index');

// Route to show the form to create a new budget goal, handled by the 'create' method of BudgetGoalController
Route::get('/budget-goals/create', [BudgetGoalController::class, 'create'])->name('budget-goals.create');

// Route to store a new budget goal, handled by the 'store' method of BudgetGoalController
Route::post('/budget-goals', [BudgetGoalController::class, 'store'])->name('budget-goals.store');