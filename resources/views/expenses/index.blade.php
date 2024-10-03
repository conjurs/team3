@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Expense Tracker</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('expenses.index') }}" class="my-4">
        <label for="from_date">From Date</label>
        <input type="date" name="from_date" id="from_date" class="border-gray-300 focus:ring-indigo-500">
        
        <label for="to_date">To Date</label>
        <input type="date" name="to_date" id="to_date" class="border-gray-300 focus:ring-indigo-500">

        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4">Filter</button>
    </form>

    <a href="{{ route('expenses.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Add New Expense</a>

    <h2 class="text-xl">Total Expenses: ${{ $totalExpenses }}</h2>

    <table class="min-w-full table-auto mt-4">
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->description }}</td>
                    <td>${{ $expense->amount }}</td>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->category }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <canvas id="monthlyExpensesChart" class="mt-4"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const monthlyExpenses = @json($monthlyExpenses->pluck('total'));
        const months = @json($monthlyExpenses->pluck('month'));

        const ctx = document.getElementById('monthlyExpensesChart').getContext('2d');
        const monthlyExpensesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Monthly Expenses',
                    data: monthlyExpenses,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection