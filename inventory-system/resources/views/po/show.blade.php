<!-- resources/views/po/show.blade.php -->
@extends('layouts.app')

@section('title', 'PO Details')

@section('content')
    <h1 class="text-2xl font-bold mb-4">PO Details</h1>
    <p><strong>PO Number:</strong> {{ $po->po_number }}</p>
    <p><strong>Warehouse:</strong> {{ $po->warehouse->name }}</p>

    <h2 class="text-xl font-bold mt-4">MAs under this PO</h2>
    <ul class="list-disc pl-6">

        @foreach($po->mas as $ma)
       
            <li>
                <a href="{{ route('ma.show', $ma->id) }}" class="text-blue-500 hover:underline">{{ $ma->ma_number }}</a>
            </li>
        @endforeach
    </ul>
    
    <h2 class="text-xl font-bold mt-4">SMRs under this PO</h2>
    <ul class="list-disc pl-6">
        @foreach($po->smrs as $smr)
            <li>
                <a href="{{ route('smr.show', $smr->id) }}" class="text-blue-500 hover:underline">{{ $smr->smr_number }}</a>
            </li>
        @endforeach
    </ul>
<!-- 
    <h2 class="text-xl font-bold mt-4">items under this PO</h2>
    <ul class="list-disc pl-6">
    @foreach($po->mas as $ma)
                @foreach($ma->items as $item)
                    <li class="mb-2">
                        <strong>{{ $item->item_name }}</strong> 
                        (Quantity: {{ $item->pivot->quantity }})
                    </li>
                @endforeach
            @endforeach
    </ul> -->


   
           
@endsection
