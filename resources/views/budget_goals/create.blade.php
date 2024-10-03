@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Add New Budget Goal</h1>
    <form method="POST" action="{{ route('budget-goals.store') }}">
        @csrf
        <div class="mt-4">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="border-gray-300 focus:ring-indigo-500" required>
        </div>
        <div class="mt-4">
            <label for="goal_amount">Goal Amount</label>
            <input type="text" name="goal_amount" id="goal_amount" class="border-gray-300 focus:ring-indigo-500" required>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4">Add Goal</button>
    </form>
@endsection
