<?php

namespace App\Http\Controllers;

use App\Models\BudgetGoal;
use Illuminate\Http\Request;

class BudgetGoalController extends Controller
{
    // Näitab kõiki eelarve eesmärke
    public function index() {
        // Võtab kõik eelarve eesmärgid andmebaasist
        $goals = BudgetGoal::all();
        // Tagastab 'budget_goals.index' vaate koos saadud eesmärkidega
        return view('budget_goals.index', compact('goals'));
    }

    // Näitab lehte uue eelarve eesmärgi lisamiseks
    public function create() {
        return view('budget_goals.create');
    }

    // Salvestab uue eelarve eesmärgi
    public function store(Request $request) {
        $request->validate([
            'description' => 'required', // Kirjeldus on vajalik
            'goal_amount' => 'required|numeric', // Eesmärgi summa on vajalik ja peab olema number
        ]);

        // Loob uue eelarve eesmärgi valideeritud andmete põhjal
        BudgetGoal::create($request->all());
        // Suunab eelarve eesmärkide nimekirja lehele ja näitab edukat sõnumit
        return redirect()->route('budget-goals.index')->with('success', 'Budget goal added successfully');
    }
}