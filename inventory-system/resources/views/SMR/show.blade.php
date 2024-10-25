<!-- resources/views/smr/show.blade.php -->
@extends('layouts.app')

@section('title', 'SMR Details')

@section('content')
    <!-- Header Card for SMR Information -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h1 class="text-2xl font-bold mb-2">SMR Details</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <p><strong>SMR Number:</strong> {{ $smr->smr_number }}</p>
            <p><strong>PO Number:</strong> <a href="{{ route('po.show', $smr->po->id) }}" class="text-blue-500 hover:underline">{{ $smr->po->po_number }}</a></p>
            @if ($smr->voucher_image)
                <div>
                    <p><strong>Voucher:</strong></p>
                    <img src="{{ asset($smr->voucher_image) }}" alt="Voucher Image" class="max-w-xs mt-2 rounded-md shadow-sm">
                    
                    <!-- Delete Voucher Image Button -->
                    <form action="{{ route('smr.deleteVoucher', $smr->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Delete Voucher
                        </button>
                    </form>
                </div>
            @else
                <div>
                    <p>No voucher image uploaded.</p>
                    <form action="{{ route('smr.upload', $smr->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="smr_file" class="block mb-2">Upload Voucher Image:</label>
                        <input type="file" name="voucher_image" id="voucher_image" accept="image/*" class="border p-2 mb-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Upload Voucher</button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <!-- Table View for SMR Items -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Items in this SMR</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b text-left">Item Name</th>
                        <th class="py-2 px-4 border-b text-left">Quantity</th>
                        <th class="py-2 px-4 border-b text-left">Received Status</th>
                        <th class="py-2 px-4 border-b text-left">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($smr->items as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $item->item_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->pivot->quantity }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="inline-flex items-center">
                                    <span class="w-3 h-3 rounded-full mr-2
                                        @if ($item->pivot->received) bg-green-500 @else bg-yellow-500 @endif">
                                    </span>
                                    {{ $item->pivot->received ? 'Done' : 'Need Attention' }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b">{{ $item->description }}</td>
                            <td class="py-2 px-4 border-b text-right">
                                <a href="{{ route('item.edit', ['smr' => $smr->id, 'item' => $item->id]) }}" 
                                   class="text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
