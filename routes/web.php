<?php
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index'])->name('stores.dashboard');

Route::get('/create', [StoreController::class, 'create'])->name('stores.create');

Route::post('/store', [StoreController::class, 'store'])->name('stores.store');

Route::get('/{id}', [StoreController::class, 'view'])->name('stores.view');

Route::delete('/{id}', [StoreController::class, 'destroy'])->name('stores.destroy');

Route::get('/{id}/edit', [StoreController::class, 'edit'])->name('stores.edit');
Route::put('/{id}', [StoreController::class, 'update'])->name('stores.update');




