<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col items-start mt-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- PO List Card -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h2 class="text-xl font-semibold mb-4">PO List</h2>
                <p class="text-gray-600 mb-4">View all Purchase Orders</p>
                <a href="{{ route('po.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View PO List</a>
            </div>

            <!-- Imports Card -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h2 class="text-xl font-semibold mb-4">Imports</h2>
                <p class="text-gray-600 mb-4">Import data into the system</p>
                <a href="{{ route('imports') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Go to Imports</a>
            </div>

            <!-- MA Requests Card -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h2 class="text-xl font-semibold mb-4">MA Requests</h2>
                <p class="text-gray-600 mb-4">View all MA Requests with search and pagination</p>
                <a href="{{ route('ma.index') }}" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">View MA Requests</a>
            </div>

            <!-- SMR Requests Card -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h2 class="text-xl font-semibold mb-4">SMR Requests</h2>
                <p class="text-gray-600 mb-4">View all SMR Requests with search and pagination</p>
                <a href="{{ route('smr.index') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">View SMR Requests</a>
            </div>
        </div>
    </div>
@endsection
