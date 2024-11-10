<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\LocationController;

Route::resource('suppliers', SupplierController::class);
Route::resource('products', ProductController::class);
Route::resource('inventories', InventoryController::class);
Route::resource('warehouses', WarehouseController::class);
Route::resource('purchaseOrders', PurchaseOrderController::class);
Route::resource('orderItems', OrderItemController::class);
Route::resource('locations', LocationController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
