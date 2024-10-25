<!-- resources/views/ma/index.blade.php -->
@extends('layouts.app')

@section('title', 'MA Requests')

@section('content')
    <h1 class="text-2xl font-bold mb-4">MA Requests</h1>

    <form action="{{ route('ma.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search by MA Number"
            class="border p-2 rounded w-full md:w-1/3">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
    </form>

    <ul class="list-disc pl-6">
        @foreach($maRequests as $ma)
            <li>
                <a href="{{ route('ma.show', $ma->id) }}" class="text-blue-500 hover:underline">{{ $ma->ma_number }}</a>
            </li>
        @endforeach
    </ul>

    <div class="mt-4">
        {{ $maRequests->links() }}
    </div>
@endsection
