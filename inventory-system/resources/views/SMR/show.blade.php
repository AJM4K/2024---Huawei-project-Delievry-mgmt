<!-- resources/views/smr/show.blade.php -->
@extends('layouts.app')

@section('title', 'SMR Details')

@section('content')
    <h1 class="text-2xl font-bold mb-4">SMR Details</h1>
    <p><strong>SMR Number:</strong> {{ $smr->smr_number }}</p>
    <p><strong>PO Number:</strong> {{ $smr->po->po_number }}</p>

    <h2 class="text-xl font-bold mt-4">Items in this SMR</h2>
    <ul class="list-disc pl-6">
        @foreach($smr->items as $item)
            <li>
                <strong>{{ $item->item_name }}</strong> (Quantity: {{ $item->pivot->quantity }}, Received: {{ $item->pivot->received ? 'Yes' : 'No' }})
            </li>
        @endforeach
    </ul>
@endsection
