<!-- resources/views/smr/index.blade.php -->
@extends('layouts.app')

@section('title', 'SMR List for PO ' . $po->po_number)

@section('content')
    <h1 class="text-2xl font-bold mb-4">SMRs for PO: {{ $po->po_number }}</h1>

    <ul class="list-disc pl-6">
        @foreach($po->smrs as $smr)
            <li>
                <a href="{{ route('smr.show', $smr->id) }}" class="text-blue-500 hover:underline">{{ $smr->smr_number }}</a>
            </li>
        @endforeach
    </ul>
@endsection
