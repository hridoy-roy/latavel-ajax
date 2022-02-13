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

Route::get('/', [PagesController::class, 'index']);
Route::get('/create', [PagesController::class, 'create'])->name('create');
Route::post('/create/bill', [PagesController::class, 'createbill'])->name('create.boll');


Route::get('/layout', function () {
    return view('frontend.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// product add route With Ajax

// Route::post('products', [ProductController::class, 'store']);

Route::post('/products/create', [ProductController::class, 'index']);
Route::post('/products/store', [ProductController::class, 'store']);
// Route::post('/products/delete', [ProductController::class, 'store']);



// Invoice Route

Route::resource('invoices', InvoiceController::class);
