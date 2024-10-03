<?php

namespace App\Http\Controllers;

use App\Models\BudgetGoal;
use Illuminate\Http\Request;

class BudgetGoalController extends Controller
{
    // Method to list all budget goals
    public function index() {
        // Retrieve all budget goals from the database
        $goals = BudgetGoal::all();
        // Return the 'budget_goals.index' view with the retrieved goals
        return view('budget_goals.index', compact('goals'));
    }

    // Method to show the form to create a new budget goal
    public function create() {
        // Return the 'budget_goals.create' view
        return view('budget_goals.create');
    }

    // Method to store a new budget goal
    public function store(Request $request) {
        // Validate the incoming request data
        $request->validate([
            'description' => 'required', // Description is required
            'goal_amount' => 'required|numeric', // Goal amount is required and must be numeric
        ]);

        // Create a new budget goal with the validated data
        BudgetGoal::create($request->all());
        // Redirect to the budget goals index page with a success message
        return redirect()->route('budget-goals.index')->with('success', 'Budget goal added successfully');
    }
}