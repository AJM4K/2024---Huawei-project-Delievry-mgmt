<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MAController;
use App\Http\Controllers\POController;
use App\Http\Controllers\SMRController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/po', [POController::class, 'index'])->name('po.index');
Route::get('/po/{po}', [POController::class, 'show'])->name('po.show');
Route::get('/po/{po}/ma', [MAController::class, 'index'])->name('po.ma.index');
Route::get('/po/{po}/smr', [SMRController::class, 'index'])->name('po.smr.index');
Route::get('/smr/{smr}', [SMRController::class, 'show'])->name('smr.show');
Route::get('/ma/{ma}', [MAController::class, 'show'])->name('ma.show');

Route::post('/smr/{id}/upload', [SMRController::class, 'uploadVoucher'])->name('smr.upload');
