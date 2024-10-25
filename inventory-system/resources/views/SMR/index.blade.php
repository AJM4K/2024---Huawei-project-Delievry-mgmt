<!-- resources/views/smr/index.blade.php -->
@extends('layouts.app')

@section('title', 'SMR Requests')

@section('content')
    <h1 class="text-2xl font-bold mb-4">SMR Requests</h1>

    <form action="{{ route('smr.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search by SMR Number"
            class="border p-2 rounded w-full md:w-1/3">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
    </form>

    <ul class="list-disc pl-6">
        @foreach($smrRequests as $smr)
            <li>
                <a href="{{ route('smr.show', $smr->id) }}" class="text-blue-500 hover:underline">{{ $smr->smr_number }}</a>
            </li>
        @endforeach
    </ul>

    <div class="mt-4">
        {{ $smrRequests->links() }}
    </div>
@endsection
