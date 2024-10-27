<?php

use App\Exports\TestExport;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MAController;
use App\Http\Controllers\POController;
use App\Http\Controllers\SMRController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
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

Route::post('/ma/import', [MAController::class, 'import'])->name('ma.import');
Route::post('/smr/import', [SMRController::class, 'import'])->name('smr.import');
Route::get('/imports', [DashboardController::class, 'imports'])->name('imports');

Route::get('/ma-requests', [MAController::class, 'index'])->name('ma.index');
Route::get('/smr-requests', [SMRController::class, 'index'])->name('smr.index');

Route::delete('/smr/{id}/delete-voucher', [SMRController::class, 'deleteVoucher'])->name('smr.deleteVoucher');

Route::get('/smr/{smr}/item/{item}/edit', [ItemController::class, 'edit'])->name('item.edit');
Route::post('/smr/{smr}/item/{item}/update', [ItemController::class, 'update'])->name('item.update');

Route::get('test/export', function() {
    
    return  Excel::download(new TestExport, 'test.xlsx');
});
