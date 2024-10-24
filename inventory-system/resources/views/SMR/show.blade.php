<!-- resources/views/smr/show.blade.php -->
@extends('layouts.app')

@section('title', 'SMR Details')

@section('content')
    <h1 class="text-2xl font-bold mb-4">SMR Details</h1>
    <p><strong>SMR Number:</strong> {{ $smr->smr_number }}</p>
    <p><strong>PO Number:</strong> {{ $smr->po->po_number }}</p>

    @if ($smr->voucher_image)
    <img src="{{ asset($smr->voucher_image) }}" alt="Voucher Image" style="max-width: 200px;">
@else
    <p>No voucher image uploaded.</p>
@endif


    <h2 class="text-xl font-bold mt-4">Items in this SMR</h2>
    <ul class="list-disc pl-6">
        @foreach($smr->items as $item)
            <li>
                <strong>{{ $item->item_name }}</strong> (Quantity: {{ $item->pivot->quantity }}, Received: {{ $item->pivot->received ? 'Yes' : 'No' }})
            </li>
        @endforeach
    </ul>
    
<form action="{{ route('smr.upload', $smr->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="voucher_image">Upload Voucher Image:</label>
        <input type="file" name="voucher_image" id="voucher_image" accept="image/*">
    </div>
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Upload</button>
</form>


@endsection
