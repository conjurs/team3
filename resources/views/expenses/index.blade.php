@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Expense Tracker</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <br>
    <a href="{{ route('expenses.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4">New Expense</a>
    <br>
    <br>
    <h2 class="text-xl">Total Expenses: ${{ $totalExpenses }}</h2>

    <table class="min-w-full table-auto mt-4">
        <tbody>
            <tr class="font-bold">
                <td>Amount</td>
                <td>Date</td>
                <td>Category</td>
                <td>Description</td>
                <td>Actions</td>
            </tr>
        </tbody>
        <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <td>${{ $expense->amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($expense->date)->format('Y-m-d') }}</td>
                    <td>{{ $expense->category }}</td>
                    <td>{{ $expense->description }}</td>
                    <td>
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-black font-bold py-1 px-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <canvas id="monthlyExpensesChart" class="mt-4"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const monthlyExpenses = @json($monthlyExpenses->pluck('total'));
        const monthNumbers = @json($monthlyExpenses->pluck('month')); // Siin on numbrid 1-12
        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June', 
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        // Muuda numbrid kuunimedeks
        const months = monthNumbers.map(num => monthNames[num - 1]); // -1, et saada indeks

        const ctx = document.getElementById('monthlyExpensesChart').getContext('2d');
        const monthlyExpensesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months, // Kuunimed siin
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