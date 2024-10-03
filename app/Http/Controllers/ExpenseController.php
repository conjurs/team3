<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request) {
        $query = Expense::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('date', [$request->from_date, $request->to_date]);
        }

        $expenses = $query->get();
        $totalExpenses = $query->sum('amount');

        $monthlyExpenses = $query->selectRaw('MONTH(date) as month, SUM(amount) as total')
                                  ->groupBy('month')
                                  ->orderBy('month')
                                  ->get();

        return view('expenses.index', compact('expenses', 'totalExpenses', 'monthlyExpenses'));
    }

    public function create() {
        return view('expenses.create');
    }

    public function store(Request $request) {
        $request->validate([
            'description' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'category' => 'required',
        ]);

        Expense::create($request->all());
        return redirect()->route('expenses.index')->with('success', 'Expense added successfully');
    }
}
