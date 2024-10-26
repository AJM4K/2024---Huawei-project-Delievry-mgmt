<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto mt-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- PO List Card -->
            <a href="{{ route('po.index') }}" class="bg-white shadow-md rounded-lg p-6 flex items-center hover:bg-gray-100 transition">
                <!-- Icon for PO List -->
                
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-blue-500 mr-4">
  <path d="M21 6.375c0 2.692-4.03 4.875-9 4.875S3 9.067 3 6.375 7.03 1.5 12 1.5s9 2.183 9 4.875Z" />
  <path d="M12 12.75c2.685 0 5.19-.586 7.078-1.609a8.283 8.283 0 0 0 1.897-1.384c.016.121.025.244.025.368C21 12.817 16.97 15 12 15s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.285 8.285 0 0 0 1.897 1.384C6.809 12.164 9.315 12.75 12 12.75Z" />
  <path d="M12 16.5c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 0 0 1.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 0 0 1.897 1.384C6.809 15.914 9.315 16.5 12 16.5Z" />
  <path d="M12 20.25c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 0 0 1.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 0 0 1.897 1.384C6.809 19.664 9.315 20.25 12 20.25Z" />
</svg>

                <div>
                    <h2 class="text-xl font-semibold">PO List</h2>
                    <p class="text-gray-600">View and manage purchase orders.</p>
                </div>
            </a>

            <!-- Imports Card -->
            <a href="{{ route('imports') }}" class="bg-white shadow-md rounded-lg p-6 flex items-center hover:bg-gray-100 transition">
                <!-- Icon for Imports -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <div>
                    <h2 class="text-xl font-semibold">Imports</h2>
                    <p class="text-gray-600">Manage import files for MAs and SMRs.</p>
                </div>
            </a>

            <!-- MA Requests Card -->
            <a href="{{ route('ma.index') }}" class="bg-white shadow-md rounded-lg p-6 flex items-center hover:bg-gray-100 transition">
                <!-- Icon for MA Requests -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
                <div>
                    <h2 class="text-xl font-semibold">MA Requests</h2>
                    <p class="text-gray-600">View and manage MA requests.</p>
                </div>
            </a>

            <!-- SMR Requests Card -->
            <a href="{{ route('smr.index') }}" class="bg-white shadow-md rounded-lg p-6 flex items-center hover:bg-gray-100 transition">
                <!-- Icon for SMR Requests -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <div>
                    <h2 class="text-xl font-semibold">SMR Requests</h2>
                    <p class="text-gray-600">View and manage SMR requests.</p>
                </div>
            </a>
        </div>
    </div>
@endsection
