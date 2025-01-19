<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ManufacturerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::middleware(['auth'])->group(function () {
    Route::get('/',[AdminController::class,'Backend']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::resource('manufacturer',ManufacturerController::class);
Route::resource('category',CategoryController::class);
Route::resource('units', UnitController::class);
Route::resource('sub-categories', SubCategoryController::class);
Route::resource('sub-categories', SubCategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('products', ProductController::class);
Route::get('/product-details/{id}', [ProductController::class, 'getProductDetails']);
Route::resource('sales', SalesController::class); 
Route::resource('purchases', PurchaseController::class);

