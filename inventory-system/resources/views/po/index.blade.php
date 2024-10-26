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

    <!-- <ul class="list-disc pl-6">
        @forelse($pos as $po)
            <li>
                <a href="{{ route('po.show', $po->id) }}" class="text-blue-500 hover:underline">{{ $po->po_number }}</a>
            </li>
        @empty
            <li>No POs found.</li>
        @endforelse
    </ul> -->


    <!-- PO Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($pos as $po)
     
            <div class="bg-white shadow-md rounded-lg p-4">
                    <!-- Status Indicator Circle -->
         <div class="w-4 h-4 rounded-full mr-2
                        @if ($po->allItemsReceived()) bg-green-400 @else bg-yellow-400 @endif">
</div>
                <h2 class="text-xl font-semibold mb-2">PO Number: {{ $po->po_number }}</h2>
              

                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('po.show', $po->id) }}" class="text-blue-500 hover:underline">View Details</a>
                    
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $pos->links() }}
    </div>
@endsection
