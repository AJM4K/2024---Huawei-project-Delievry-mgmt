<!-- resources/views/ma/index.blade.php -->
@extends('layouts.app')

@section('title', 'MA List for PO ' . $po->po_number)

@section('content')
    <h1 class="text-2xl font-bold mb-4">MAs for PO: {{ $po->po_number }}</h1>

    <ul class="list-disc pl-6">
        @foreach($po->mas as $ma)
            <li>
                <a href="{{ route('ma.show', $ma->id) }}" class="text-blue-500 hover:underline">{{ $ma->ma_number }}</a>
            </li>
        @endforeach
    </ul>
@endsection
