<!-- resources/views/po/show.blade.php -->

@extends('layouts.app')

@section('title', 'PO Details')

@section('content')
    <!-- PO Information Card -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h1 class="text-2xl font-bold mb-4">PO Details</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <p><strong>PO Number:</strong> {{ $po->po_number }}</p>
            
        </div>
       
    </div>

    <!-- MAs Associated with this PO -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">MAs under this PO</h2>
        <div class="grid grid-cols-1 gap-4">
            @foreach($po->mas as $ma)
                <div class="p-4 border border-gray-200 rounded-md">
                    <h3 class="text-lg font-semibold"><a href="{{ route('ma.show', $ma->id) }}" class="text-blue-500 hover:underline">{{ $ma->ma_number }}</a></h3>
                    <p><strong>Number of Items:</strong> {{ DB::table('item_m_a')
    ->where('m_a_id', $ma->id)
    ->sum('quantity')
 }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- SMRs Associated with this PO -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">SMRs under this PO</h2>
        <div class="grid grid-cols-1 gap-4">
            @foreach($po->smrs as $smr)

                <div class="p-4 border border-gray-200 rounded-md">
                   

             <!-- Status Indicator Circle -->
             <div class="w-4 h-4 rounded-full mr-2 
                        {{ ($smr->allItemsReceived()) ? 'bg-green-400' :  'bg-yellow-400' }} ">
</div>
                    <h3 class="text-lg font-semibold"><a href="{{ route('smr.show', $smr->id) }}" class="text-blue-500 hover:underline">{{ $smr->smr_number }}</a></h3>
                    <p><strong>Numbers of Items: </strong> {{ DB::table('item_s_m_r')
    ->where('s_m_r_id', $smr->id)
    ->sum('quantity')}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
