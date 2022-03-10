<?php

use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Web site Normal pages
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::post('/create/bill', [PagesController::class, 'createbill'])->name('create.boll');


require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';

// product add route With Ajax


// Invoice Route

Route::group(['middleware' => ['auth','verified']], function () {
    Route::post('/products/create', [ProductController::class, 'index']);
    Route::post('/product/store', [ProductController::class, 'store'])->name('store.product');
    Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('/create/invoice', [InvoiceController::class, 'index'])->name('create');
    Route::post('/invoices/store', [InvoiceController::class, 'store'])->name('store.');
    Route::post('/invoices/complete/{id}', [InvoiceController::class, 'complete'])->name('complete.');
    Route::get('/invoice/download/{id}', [InvoiceController::class, 'download'])->name('invoice.download');
});

