<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    // Method to list all expenses
    public function index(Request $request) {
        // Start a query on the Expense model
        $query = Expense::query();

        // If 'from_date' and 'to_date' are provided in the request, filter the expenses by date range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('date', [$request->from_date, $request->to_date]);
        }

        // Get all expenses based on the query
        $expenses = $query->get();
        // Calculate the total amount of expenses
        $totalExpenses = $query->sum('amount');

        // Get the total expenses grouped by month
        $monthlyExpenses = $query->selectRaw('MONTH(date) as month, SUM(amount) as total')
                                  ->groupBy('month')
                                  ->orderBy('month')
                                  ->get();

        // Return the 'expenses.index' view with the retrieved data
        return view('expenses.index', compact('expenses', 'totalExpenses', 'monthlyExpenses'));
    }

    // Method to show the form to create a new expense
    public function create() {
        // Return the 'expenses.create' view
        return view('expenses.create');
    }

    // Method to store a new expense
    public function store(Request $request) {
        // Validate the incoming request data
        $request->validate([
            'description' => 'required', // Description is required
            'amount' => 'required|numeric', // Amount is required and must be numeric
            'date' => 'required|date', // Date is required and must be a valid date
            'category' => 'required', // Category is required
        ]);

        // Create a new expense with the validated data
        Expense::create($request->all());
        // Redirect to the expenses index page with a success message
        return redirect()->route('expenses.index')->with('success', 'Expense added successfully');
    }
}