<!-- resources/views/ma/show.blade.php -->
@extends('layouts.app')

@section('title', 'MA Details')

@section('content')
    <!-- Header Card for MA Information -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h1 class="text-2xl font-bold mb-2">MA Details</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <p><strong>MA Number:</strong> {{ $ma->ma_number }}</p>
            <p><strong>PO Number:</strong> <a href="{{ route('po.show', $ma->po->id) }}" class="text-blue-500 hover:underline">{{ $ma->po->po_number }}</a></p>
            <p><strong>Warehouse:</strong> {{ $ma->po->warehouse->name }}</p>
            <p><strong>Status:</strong> {{ $ma->status }}</p>
            <!-- Add more fields if needed -->
        </div>
    </div>

    <!-- Table View for MA Items -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Items in this MA</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b text-left">Item Name</th>
                        <th class="py-2 px-4 border-b text-left">Quantity</th>
                       
                        <th class="py-2 px-4 border-b text-left">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ma->items as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $item->item_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->pivot->quantity }}</td>
                            
                            <td class="py-2 px-4 border-b">{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
