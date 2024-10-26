<!-- resources/views/items/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h1 class="text-2xl font-bold mb-4">Edit Item: {{ $item->item_name }}</h1>

        <form action="{{ route('item.update', ['smr' => $smr->id, 'item' => $item->id]) }}" method="POST">
            @csrf

            <!-- Quantity -->
            <div class="mb-4">
                <label for="quantity" class="block font-medium">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ $item->pivot->quantity }}" 
                       class="border p-2 w-full mt-2" required min="1">
            </div>

            <!-- Received Status -->
            <div class="mb-4">
                <label for="received" class="block font-medium">Received Status</label>
                <select name="received" id="received" class="border p-2 w-full mt-2">
                    <option value="1" @if($item->pivot->received) selected @endif>Done</option>
                    <option value="0" @if(!$item->pivot->received) selected @endif>Need Attention</option>
                </select>
            </div>

            

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Changes</button>
        </form>
    </div>
@endsection
