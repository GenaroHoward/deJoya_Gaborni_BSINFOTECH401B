<?php
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index'])->name('stores.dashboard');
Route::get('/create', [StoreController::class, 'create'])->name('stores.create');
Route::post('/store', [StoreController::class, 'store'])->name('stores.store'); // Use store for POST requests


