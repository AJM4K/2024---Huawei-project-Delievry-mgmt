<!-- resources/views/ma/show.blade.php -->
@extends('layouts.app')

@section('title', 'MA Details')

@section('content')
    <h1 class="text-2xl font-bold mb-4">MA Details</h1>
    <p><strong>MA Number:</strong> {{ $ma->ma_number }}</p>
    <p><strong>PO Number:</strong> {{ $ma->po->po_number }}</p>

    <h2 class="text-xl font-bold mt-4">Items in this MA</h2>
    <ul class="list-disc pl-6">
        @foreach($ma->items as $item)
            <li>
                <strong>{{ $item->item_name }}</strong> (Quantity: {{ $item->pivot->quantity }})
            </li>
        @endforeach
    </ul>
@endsection
