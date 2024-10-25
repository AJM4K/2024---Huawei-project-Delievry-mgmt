<!-- resources/views/po/index.blade.php -->
@extends('layouts.app')

@section('title', 'PO List')

@section('content')
    <h1 class="text-2xl font-bold mb-4">PO List</h1>

    <!-- Search Form -->
    <form action="{{ route('po.index') }}" method="GET" class="mb-4">
        <input 
            type="text" 
            name="search" 
            placeholder="Search PO by number" 
            value="{{ request('search') }}" 
            class="border p-2 rounded w-1/2"
        >
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
    </form>

    <ul class="list-disc pl-6">
        @forelse($pos as $po)
            <li>
                <a href="{{ route('po.show', $po->id) }}" class="text-blue-500 hover:underline">{{ $po->po_number }}</a>
            </li>
        @empty
            <li>No POs found.</li>
        @endforelse
    </ul>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $pos->links() }}
    </div>
@endsection
