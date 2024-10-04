<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    // Näitab kõiki kulutusi
    public function index(Request $request) {
        // Alustab päringut kulutuste mudeli põhjal
        $query = Expense::query();

        // Kui 'from_date' ja 'to_date' on antud, filtreerib kulutused kuupäeva vahemiku järgi
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('date', [$request->from_date, $request->to_date]);
        }

        // Võtab kõik kulutused päringu põhjal
        $expenses = $query->get();
        // Arvutab kulutuste kogusumma
        $totalExpenses = $query->sum('amount');

        // Võtab kokku kulutused kuude kaupa
        $monthlyExpenses = $query->selectRaw('MONTH(date) as month, SUM(amount) as total')
                                  ->groupBy('month')
                                  ->orderBy('month')
                                  ->get();

        // Tagastab 'expenses.index' vaate koos saadud andmetega
        return view('expenses.index', compact('expenses', 'totalExpenses', 'monthlyExpenses'));
    }

    // Näitab lehte uue kulu lisamiseks
    public function create() {
        // Tagastab 'expenses.create' vaate
        return view('expenses.create');
    }

    // Salvestab uue kulu
    public function store(Request $request) {
        // Kontrollib, et sisendandmed oleksid õiged
        $request->validate([
            'description' => 'required', // Kirjeldus on vajalik
            'amount' => 'required|numeric', // Summa on vajalik ja peab olema number
            'date' => 'required|date', // Kuupäev on vajalik ja peab olema kehtiv kuupäev
            'category' => 'required', // Kategooria on vajalik
        ]);

        // Loob uue kulu valideeritud andmete põhjal
        Expense::create($request->all());
        // Suunab kulude nimekirja lehele ja näitab edukat sõnumit
        return redirect()->route('expenses.index')->with('success', 'Expense added successfully');
    }

    // Kustutab kulu
    public function destroy($id)
    {
        // Otsib kulu ID järgi ja kustutab selle
        $expense = Expense::findOrFail($id);
        $expense->delete();

        // Suunab kulude nimekirja lehele ja näitab edukat sõnumit
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully');
    }
}