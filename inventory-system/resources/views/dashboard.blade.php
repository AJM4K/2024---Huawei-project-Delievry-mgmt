<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <div class="mb-6">
        <h2 class="text-xl font-bold mb-2">Import MA</h2>
        <form action="{{ route('ma.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="ma_file" class="block mb-2">Select MA Excel file:</label>
            <input type="file" name="ma_file" id="ma_file" accept=".xlsx,.xls,.csv" class="border p-2 mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Upload MA</button>
        </form>
    </div>

    <div>
        <h2 class="text-xl font-bold mb-2">Import SMR</h2>
        <form action="{{ route('smr.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="smr_file" class="block mb-2">Select SMR Excel file:</label>
            <input type="file" name="smr_file" id="smr_file" accept=".xlsx,.xls,.csv" class="border p-2 mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Upload SMR</button>
        </form>
    </div>
@endsection
