@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Add New Expense</h1>
    <form method="POST" action="{{ route('expenses.store') }}">
        @csrf
        <div class="mt-4">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="border-gray-300 focus:ring-indigo-500" required>
        </div>
        <div class="mt-4">
            <label for="amount">Amount</label>
            <input type="text" name="amount" id="amount" class="border-gray-300 focus:ring-indigo-500" required>
        </div>
        <div class="mt-4">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="border-gray-300 focus:ring-indigo-500" required>
        </div>
        <div class="mt-4">
            <label for="category">Category</label>
            <select name="category" id="category" class="border-gray-300 focus:ring-indigo-500" required>
                <option value="auto">Auto</option>
                <option value="toit">Toit</option>
                <option value="kodulaen">Kodulaen</option>
                <option value="kommunaalid">Kommunaalid</option>
                <option value="meelelahutus">Meelelahutus</option>
                <option value="meelerahufond">Meelerahufond</option>
            </select>
        </div>
        <div class="mt-4 flex space-x-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block w-40">Add Expense</button>
            <a href="{{ route('expenses.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block w-40 text-center">Back to Expenses</a>
        </div>
    </form>
@endsection