<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MAController;
use App\Http\Controllers\POController;
use App\Http\Controllers\SMRController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// PO Routes
Route::get('/po', [POController::class, 'index'])->name('po.index');
Route::get('/po/{po_id}', [POController::class, 'show'])->name('po.show');

// Material Request (MA) Routes for a specific PO
Route::get('/po/{po_id}/ma', [POController::class, 'listMAs'])->name('po.ma.index');
Route::get('/ma/{ma_id}', [MAController::class, 'show'])->name('ma.show');

// SMR Routes for a specific PO
Route::get('/po/{po_id}/smr', [POController::class, 'listSMRs'])->name('po.smr.index');
Route::get('/smr/{smr_id}', [SMRController::class, 'show'])->name('smr.show');
