<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer/table', [CustomerController::class, 'index'])->name('customer_table');

Route::get('/customer/{customer}/read', [CustomerController::class, 'show'])->name('customer_show');

Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer_create');
Route::post('/customer/create', [CustomerController::class, 'store'])->name('customer_store');

Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer_edit');
Route::put('/customer/{customer}/edit', [CustomerController::class, 'update'])->name('customer_update');

Route::delete('/customer/{customer}/delete', [CustomerController::class, 'destroy'])->name('customer_destroy');
