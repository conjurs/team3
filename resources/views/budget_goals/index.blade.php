@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Budget Goals</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full table-auto mt-4">
        <thead>
            <tr>
                <th>Description</th>
                <th>Goal Amount</th>
                <th>Current Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($goals as $goal)
                <tr>
                    <td>{{ $goal->description }}</td>
                    <td>${{ $goal->goal_amount }}</td>
                    <td>${{ $goal->current_amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('budget-goals.create') }}" class="bg-blue-500 text-white py-2 px-4 mt-4 inline-block">Add Budget Goal</a>
@endsection
