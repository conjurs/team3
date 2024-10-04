@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Eelarve Eesmärgid</h1>

    {{-- Näitab teadet kui midagi on edukalt tehtud --}}
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel eesmärkide kuvamiseks --}}
    <table class="min-w-full table-auto mt-4">
        <thead>
            <tr>
                <th>Kirjeldus</th>
                <th>Eesmärgi Summa</th>
                <th>Praegune Summa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($goals as $goal)
                <tr>
                    {{-- Kuvab iga eesmärgi andmed --}}
                    <td>{{ $goal->description }}</td>
                    <td>${{ $goal->goal_amount }}</td>
                    <td>${{ $goal->current_amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Nupp uue eesmärgi lisamiseks --}}
    <a href="{{ route('budget-goals.create') }}" class="bg-blue-500 text-white py-2 px-4 mt-4 inline-block">Lisa Eelarve Eesmärk</a>
@endsection
