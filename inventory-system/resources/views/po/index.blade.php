<!-- resources/views/po/index.blade.php -->
@extends('layouts.app')

@section('title', 'PO List')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Purchase Orders</h1>

    <ul class="list-disc pl-6">
        @foreach($pos as $po)
            <li>
                <a href="{{ route('po.show', $po->id) }}" class="text-blue-500 hover:underline">{{ $po->po_number }}</a>
                (Warehouse: {{ $po->warehouse->name }})
            </li>
        @endforeach
    </ul>
@endsection
