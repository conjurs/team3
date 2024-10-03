<?php

namespace App\Http\Controllers;

use App\Models\BudgetGoal;
use Illuminate\Http\Request;

class BudgetGoalController extends Controller
{
    public function index() {
        $goals = BudgetGoal::all();
        return view('budget_goals.index', compact('goals'));
    }

    public function create() {
        return view('budget_goals.create');
    }

    public function store(Request $request) {
        $request->validate([
            'description' => 'required',
            'goal_amount' => 'required|numeric',
        ]);

        BudgetGoal::create($request->all());
        return redirect()->route('budget-goals.index')->with('success', 'Budget goal added successfully');
    }
}
